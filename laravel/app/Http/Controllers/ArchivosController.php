<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;



// Models

use App\Models\Casos;

use App\Models\Archivos;

use App\Models\ArchivosCasos;



class ArchivosController extends Controller

{

    public function cargarArchivosCaso(Request $request){

        try {

            $caso = Casos::whereRaw('md5(id) ="'.$request->key.'"')->first()->id;

            $caso ??= null;

            

            if($caso !== null) {

                

                $respuesta = $this->cargarArchivo($request);                

                if($respuesta !== null){

                    

                    DB::beginTransaction();

                    $archivo = Archivos::updateOrCreate(

                        [
                            'nombre_original' => $respuesta -> nombre_original,

                            'nombre_unico' => $respuesta -> nombre_unico

                        ]

                    );

                    $archivo_caso = ArchivosCasos::updateOrCreate([

                        "caso_fk" => $caso,

                        "archivo_fk" => $archivo -> id

                    ]);

                    DB::commit();

                    $mensaje = ["mensaje"=>"Se guardo el archivo ".$respuesta -> nombre_original." con exito!"];

                }else{                     

                    $mensaje = ["error"=>"Ups! Ocurrio un error"];

                }                

                return response()->json($mensaje);

                

            }else{                

                return response()->json(['aviso' =>"No se recibio el caso para asociar los archivos"]);

            }

        } catch (\Exception $e) {

            DB::rollback();

            return response()->json(['error' => 'Linea -> '.$e->getLine().' Error -> '.$e->getMessage()]);

        }

    }



    public function showArchivosCasos($key){

        return ArchivosCasos::whereRaw('md5(caso_fk)="'.$key.'"')

        ->select ([DB::raw('md5(archivos.id) as key'), 'archivos.nombre_unico as archivo'])

        ->join('archivos','archivos.id','=', 'archivos_casos.archivo_fk')->get();

    }



    public function descargarArchivo($key){

        $query = Archivos::whereRaw('md5(id)="'.$key.'"');

        if($query->exists()){

            $archivo = $query->first();

            $path = public_path();

            $carpeta = '/archivos/';

    

            return response()->download( $path.$carpeta.$archivo->nombre_unico, $archivo->nombre_original);

        }else

            return response()->json(["aviso"=>"No se encontro el archivo"]);

    }



    public function eliminarArchivo($key){

        try{

            $query = Archivos::whereRaw('md5(id)="'.$key.'"')->first();



            if($query === null)

                return ["aviso"=>"No se encontro el archivo"];   

            

            $this->eliminarArchivo_public($query);

       

            if(!$query->delete())

                return ["aviso"=>"No se borro el registro"];



            return ["aviso"=>"Se borro el archivo"];

            

        } catch (\Exception $exception) {

            return ['aviso'=> $exception];

        } 

    }



    public function eliminarArchivoCaso($key){

        ArchivosCasos::whereRaw('md5(archivos_casos.archivo_fk) ="'.$key.'"')->delete();

        return response()->json($this->eliminarArchivo($key));

    }



    private function cargarArchivo($request){

        $file = $request->file('archivo');  

        $name_img = null;

        $mensaje = null;

        

        if(!is_null($request->file('archivo'))){



            $path = public_path();

            $carpeta = '/archivos';

            $file = $request->file('archivo');



            $nombre_original = $file->getClientOriginalName();

            $nombre_unico = uniqid();

            $file -> move($path.$carpeta, $nombre_unico);

            

            return (object)[

                "nombre_original" => $nombre_original, 

                "nombre_unico" =>  $nombre_unico

            ];

        }else return null;

        

    }


    private function eliminarArchivo_public($archivo) {

        $path = public_path();

        $carpeta = '/archivos/';

        \File::delete($path.$carpeta.$archivo->nombre_unico); 

        return response()->json(["mensaje"=>"Exito se borro el archivo"],200);

    }



}