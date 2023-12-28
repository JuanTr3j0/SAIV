<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;





use App\Models\User;

Use App\Models\Oficinas;

use Carbon\Carbon;



class AuthController extends Controller

{

    public function rol($user){

        $roles = [
            'Usuaria/o',
            'Administrador',
            'Super Administrador'
        ];



        foreach ($roles as $key => $value) {

            if($user->hasRole($value)){

               return $value;

            }

        }

    }



    /**

     * Registro de usuario

     */

    public function signUp(Request $request)

    {

        //Obtener usuario mediante su key md5 si existe

        $_usuario  = User::select('id')->whereRaw("md5(id) like '".$request->key."'")->first();

        $_id_usuario = is_null($_usuario)? null : $_usuario->id; 

        /* Este es un método de validación que verifica si el usuario ha ingresado la información

        requerida. Si el usuario no ha ingresado la información requerida, el usuario recibirá un

        mensaje de error. */



        $validator = Validator::make($request->all(),([

            'usuario'       =>  'required',

            'correo'        =>  ['required','email:rfc,dns','max:25','string','unique:users,email'.(is_null($_usuario) ? null : ','.$_id_usuario)],

            'oficina'       =>  'required',

            'tipo_usuario'  =>  'required',

            'contraseña'    =>  'required|min:8',

            'repetir_contraseña' => ['required','same:contraseña','min:8']

        ]));



        if($validator->fails()) { 

            return response()->json(['error'=>$validator->errors()->all()]); 

        }

        $oficina = null;

        if(auth()->user()->hasRole('Super Administrador') || auth()->user()->hasRole('Administrador'))

            $oficina = auth()->user()->hasRole('Super Administrador') ? $request->oficina :  auth()->user()->oficina;



       /* Este es el código que crea el usuario. */

        $user = User::updateOrCreate(

            [ 'id' =>  $_id_usuario],

            [

                'name' => $request->usuario,

                'email' => $request->correo,

                'oficina' => $oficina,

                'password' => bcrypt($request->contraseña)

            ]

        );



        // Eliminacion de roles y permisos para usuario

        $user->roles()->detach();

        

        // Obtengo el rol que se desea asignar

        $rol = $request->tipo_usuario;

        

        // Asigno el rol al usuario

        if($rol === 'Usuaria' && auth()->user()->hasRole('Administrador'))

            $user->assignRole($rol);

        else if(($rol === 'Administrador' || $rol === 'Usuaria') && auth()->user()->hasRole('Super Administrador'))

            $user->assignRole($rol);



        // Asigno permisos para usuario        

        foreach ($request->permisos as $key => $value) {

            $modulo = (object)$value;

            foreach ($modulo->permisos as $key => $value) {

                $permiso = (object) $value;

                if(boolval($permiso->bool) && $rol === 'Usuaria'){

                    $user->givePermissionTo($modulo->modulo.' '.$permiso->name);

                }else{

                    $user->revokePermissionTo($modulo->modulo.' '.$permiso->name);

                }

            }

        }

        



        /* Esta es la respuesta que se enviará al usuario. Contiene un mensaje de que el usuario se ha

        creado correctamente. */

        return response()->json([

            'key' => DB::select(DB::raw("select md5(".$user->id.") as 'key';"))[0]->key,

            'mensaje' => 'Registro Guardado',

            'usuario' => $user->hasRole('Usuaria')

        ], 201);

    }



    /**

     * Inicio de sesión y creación de token

     */

    public function login(Request $request)

    {   

        /* Este es un método de validación que verifica si el usuario ha ingresado la información

        requerida. Si el usuario no ha ingresado la información requerida, el usuario recibirá un

        mensaje de error. */

        $request->validate([

            'correo' => 'required|string|email',

            'contrasena' => 'required|string',

            'remember_me' => 'boolean'

        ]);



        /* Este es el código que crea las credenciales. */

        $credentials = array("email"=>$request->correo, 'password'=>$request->contrasena, 'estado'=>true);

        

        /* Esta es una declaración condicional que verifica si el usuario está autorizado. Si el

        usuario no está autorizado, recibirá un error 401. */

        if (!Auth::attempt($credentials))

            return response()->json([

                'message' => 'Correo o contraseña incorrecto.'

            ], 403);

        

        $user = $request->user();

        /* Este es el código que crea el token. La primera línea crea el token. La segunda línea verifica si el

        usuario ha marcado la casilla de verificación recordarme. Si es así, el token caducará en un

        dia. La última línea guarda el token. */

        

        $tokenResult = $user->createToken('Personal Access Token');

        $date_expires = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->addDay(2))->format('Y-m-d H:i:s');

        $token = $tokenResult->token;

        $token->expires_at = $date_expires;

        $token->save();

       

         /* Esta es la respuesta que se enviará al usuario. Contiene el token de acceso, el tipo de token

        y la fecha de vencimiento. */

        return response()->json([

            "mensaje"       =>"Inicio de Sesión",

            "usuario"       => $user->name,

            "correo"        => $user->email,

            "acceso"        => $this->rol($user),

            "oficina"        => User::select('oficinas.codigo as codigo')->join('oficinas', 'oficinas.id', '=', 'users.oficina')->findOrFail(auth()->id())->codigo,

            'access_token'  => $tokenResult->accessToken,

            'token_type'    => 'Bearer',

            'expires_at'    => Carbon::parse($token->expires_at)->toDateTimeString()

        ], 201);        

    }

    public function cambioOficina(Request $request){
        try {
            
            
            $id_usuario = auth()->id();

            return response()->json([
                "mensaje" =>$id_usuario,
            ], 201);     
        }catch (\Exception $e) {
            bitacora_errores('AuthController.php', $e);
            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);
        }
    }

    /**

     * Cierre de sesión (anular el token)

     */

    public function logout(Request $request)

    {

        /* Revocación de la ficha. */

        $request->user()->token()->revoke();



       /* Devolver una respuesta JSON con un mensaje. */

        return response()->json([

            'message' => 'Cerrada la sesión con éxito'

        ]);

    }



    public function refrescarInfoSession(){

        return [Auth::check()];

        if(Auth::check()){

            return [

                "sesionCaduco"  => true,

                "usuario"       => null,

                "correo"        => null,

                "acceso"        => null,

                "oficina"       => null,

                "permisos"      => null,

            ];

        }



        $permisos = [];

        foreach ($this->getPermisos() as $key0 => $value0) {

            

            $permiso = (object) $value0;

            $modulo = $permiso -> modulo;



            $array_permiso = [];

            foreach ($permiso -> permisos as $key1 => $value1) {                    

                $permisoItem = (object) $value1;

                array_push($array_permiso, [

                    "name" => $permisoItem->name,

                    "bool" => auth()->user()->hasPermissionTo($modulo.' '.$permisoItem->name) ?? false,

                ]);

            }



            $array_permiso_item = [

                'modulo' => $modulo,

                'permisos' => $array_permiso

            ];



            array_push($permisos, $array_permiso_item);

        }



        //$permisos;



        return [

            "sesionCaduco"  => false,

            "usuario"       => auth()->user()->name,

            "correo"        => auth()->user()->email,

            "acceso"        => $this->rol(auth()->user()),

            "oficina"       => \App\Models\User::select('oficinas.codigo as codigo')->join('oficinas', 'oficinas.id', '=', 'users.oficina')->findOrFail(auth()->id())->codigo,

            "permisos"      => $permisos,

        ];

    }



    public function opciones(){

        $oficinas = Oficinas::select([DB::raw('id as "key"'), DB::raw("CONCAT(lugar, ' (', codigo, ')') as opcion")])->get();

        return response()->json([

            'oficinas'=>$oficinas

        ], 201);

    }



    private function getPermisosArray() {

        return [

            'Casos Crear',

            'Casos Ver',

            'Casos Editar',

            'Casos Subir Archivos',

            'Casos Bajar Archivos',

            'Ludoteca Crear',

            'Ludoteca Ver',

            'Ludoteca Editar',

            'Ludoteca Agenda',

            'Seguimiento Juridico Crear',

            'Seguimiento Juridico Ver',

            'Seguimiento Juridico Editar',

            'Seguimiento Juridico Agenda',

            'Camara Gessell Crear',

            'Camara Gessell Ver',

            'Camara Gessell Editar',

            'Camara Gessell Agenda',

        ];

    }

    private function getPermisos (){



        return [

            [

              'modulo' =>'Casos',

              'permisos' => [

                ['name'=>'Crear',   'bool' => false], 

                ['name'=>'Ver',     'bool' => false], 

                ['name'=>'Editar',  'bool' => false], 

                ['name'=>'Borrar',  'bool' => false],

                ['name' =>'Subir Archivos', 'bool' => false],

                ['name' =>'Bajar Archivos', 'bool' => false],

              ]

            ],

            [

                'modulo' => 'Ludoteca',

                'permisos' => [                    

                    ['name'=>'Crear',    'bool' => false], 

                    ['name'=>'Ver',      'bool' => false], 

                    ['name'=>'Editar',   'bool' => false], 

                    ['name'=>'Borrar',   'bool' => false],

                    ['name' => 'Agenda', 'bool' => false]                    

                ]

            ],

            [

              'modulo' => 'Seguimiento Juridico',

              'permisos' => [                    

                    ['name'=>'Crear',   'bool' => false], 

                    ['name'=>'Ver',     'bool' => false], 

                    ['name'=>'Editar',  'bool' => false], 

                    ['name'=>'Borrar',  'bool' => false],

                    ['name' => 'Agenda', 'bool' => false]                    

                ]

            ],

            [

              'modulo' => 'Camara Gessell',

              'permisos' => [                    

                    ['name'=>'Crear',   'bool' => false], 

                    ['name'=>'Ver',     'bool' => false], 

                    ['name'=>'Editar',  'bool' => false], 

                    ['name'=>'Borrar',  'bool' => false],

                    ['name' => 'Agenda', 'bool' => false]                    

                ]

            ]

        ];

    }

    /**

     * Obtener el objeto User como json

     */

    public function show($key)

    {

        $select = [

            DB::raw('md5(id) as "key"'),

            'name as usuario',

            'email as correo',

            'id as tipo_usuario', //Rol

            'oficina',

            'estado',

            'id as permisos', //Permisos

            DB::raw('null as contraseña'),

            DB::raw('null as repetir_contraseña'),

            'estado',

            'created_at as fechaCreacion',

            'updated_at as fechaActualizacion'

        ];



        $user = User::select($select)

            ->whereRaw('md5(id) like "'.$key.'"')

        ->first();



        if($user){

            $permisos = [];

            $_user = User::select('id')->whereRaw('md5(id) like "'.$user->key.'"')->first();

            foreach ($this->getPermisos() as $key0 => $value0) {

                

                $permiso = (object) $value0;

                $modulo = $permiso -> modulo;



                $array_permiso = [];

                foreach ($permiso -> permisos as $key1 => $value1) {                    

                    $permisoItem = (object) $value1;

                    array_push($array_permiso, [

                        "name" => $permisoItem->name,

                        "bool" => $_user->hasPermissionTo($modulo.' '.$permisoItem->name),

                    ]);

                }



                $array_permiso_item = [

                    'modulo' => $modulo,

                    'permisos' => $array_permiso

                ];



                array_push($permisos, $array_permiso_item);

            }

            $user -> permisos = $permisos;

            $user -> tipo_usuario = $_user->hasRole('Usuaria')?'Usuaria':($_user->hasRole('Administrador')?'Administrador':($_user->hasRole('Super Administrador')?'Super Administrador':null));

        }



        return $user;

    }



    public function index(Request $request){



        $por_pagina = $request->porPagina;

        $por_pagina ??= 10;



        $selectRaw = "md5(users.id) as 'key', 

            CASE WHEN estado THEN \"Activo\" ELSE \"Inactivo\" END as estado, 

            CONCAT(oficinas.lugar, \" (\",oficinas.codigo,\")\") as oficina";



        $select = [DB::raw($selectRaw),'name', 'email', 'users.id as permisos', 'users.id as tipoUsuario'];

        $selectBusqueda = [DB::raw($selectRaw),'name', 'email', ];

        

        $usuarios = query_busqueda(User::class, $selectBusqueda , $request->busqueda);



        $paginado = $usuarios

        ->select($select)

        ->leftJoin('oficinas','oficinas.id', '=', 'users.oficina')

        ->orderBy('users.created_at','Desc')

        ->paginate($por_pagina);



        $paginado->getCollection()->transform(function ($value) {



            $__user = User::find($value->tipoUsuario);



            $value -> tipoUsuario =

            $__user -> hasRole('Usuaria') ? 'Usuaria':(

            $__user -> hasRole('Administrador') ? 'Administrador':(

            $__user -> hasRole('Super Administrador') ? 'Super Administrador':null));



            $value -> permisos = $__user->getAllPermissions() -> map(function($permisos){return $permisos->name;});



            return $value;

        });



        return $paginado;

    }



    public function destroy($key){

        $user = User::whereRaw('md5(id) like "'.$key.'"')->first();

        $user -> estado = !boolval($user->estado);

        return $user->save();

    }

}