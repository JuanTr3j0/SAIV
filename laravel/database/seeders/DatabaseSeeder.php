<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartamentosSeeder::class,
            MunicipiosSeeder::class,
            //UserSeeder::Class,
            AtencionBrindadaSeeder::class,
        ]);

        \App\Models\Persona::factory(100)->create();
        \App\Models\Casos::factory(300)->create();
        \App\Models\TipoAsistencia::factory(60)->create();
        \App\Models\InstitucionSeRemitira::factory(60)->create();
        //\App\Models\SeguimientoJuridico::factory(60)->create();
        
        // Creacion de roles para usuarios
        Role::create(['name' => 'Super Administrador', 'guard_name'=> 'api']);
        Role::create(['name' => 'Administrador', 'guard_name'=> 'api']);
        Role::create(['name' => 'Usuaria/o', 'guard_name'=> 'api']);
        Role::create(['name' => 'Super Administrador']);
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Usuaria/o']);
        
        // Creacion de permisos
        $modulos = [
            'Casos',
            'Seguimiento Juridico',
            'Ludoteca',
            'Camara Gessell'
        ];

        foreach ($modulos as $key => $value) {
            # code...
            Permission::create(['name' => $value.' Ver', 'guard_name'=> 'api']);
            Permission::create(['name' => $value.' Crear', 'guard_name'=> 'api']);
            Permission::create(['name' => $value.' Editar', 'guard_name'=> 'api']);
            Permission::create(['name' => $value.' Borrar', 'guard_name'=> 'api']);

            if($value === 'Casos'){
                Permission::create(['name' => $value.' Subir Archivos', 'guard_name'=> 'api']);
                Permission::create(['name' => $value.' Bajar Archivos', 'guard_name'=> 'api']);
            }

            if($value !== 'Casos'){
                Permission::create(['name' => $value.' Agenda', 'guard_name'=> 'api']);
            }
        }

        
        \App\Models\Oficinas::factory()->create([
            'codigo' => 'CH',
            'lugar' => 'Chalatenango, Chalatenango'
        ]);
        
        \App\Models\Oficinas::factory()->create([
            'codigo' => 'SS',
            'lugar' => 'San Salvador, San Salvador'
        ]);

        \App\Models\Oficinas::factory()->create([
            'codigo' => 'CD',
            'lugar' => 'San Salvador, Cuidad Delgado'
        ]);

        \App\Models\Oficinas::factory()->create([
            'codigo' => 'SO',
            'lugar' => 'San Salvador, Soyapango'
        ]);
        
        $userCH =  \App\Models\User::create([
            'name'      => 'Usuario Chalatenango',
            'email'     => 'chalatenango@bitzide.com',
            'oficina'   => 1,
            'password'  => '$2y$10$y/iGfCkpVSNf91ejekgaDuq7GEj7U8cNX7uO6t8f9KqqEk106E7Sy' //password
        ]);

        $userCH1 =  \App\Models\User::create([
            'name'      => 'Usuario Chalatenango',
            'email'     => 'chalatenango1@bitzide.com',
            'oficina'   => 1,
            'password'  => '$2y$10$y/iGfCkpVSNf91ejekgaDuq7GEj7U8cNX7uO6t8f9KqqEk106E7Sy' //password
        ]);
        $userCH2 =  \App\Models\User::create([
            'name'      => 'Usuario Chalatenango',
            'email'     => 'chalatenango2@bitzide.com',
            'oficina'   => 1,
            'password'  => '$2y$10$y/iGfCkpVSNf91ejekgaDuq7GEj7U8cNX7uO6t8f9KqqEk106E7Sy' //password
        ]);
        $userCH3 =  \App\Models\User::create([
            'name'      => 'Usuario Chalatenango',
            'email'     => 'chalatenango3@bitzide.com',
            'oficina'   => 1,
            'password'  => '$2y$10$y/iGfCkpVSNf91ejekgaDuq7GEj7U8cNX7uO6t8f9KqqEk106E7Sy' //password
        ]);
        $userCH4 =  \App\Models\User::create([
            'name'      => 'Usuario Chalatenango',
            'email'     => 'chalatenango4@bitzide.com',
            'oficina'   => 1,
            'password'  => '$2y$10$y/iGfCkpVSNf91ejekgaDuq7GEj7U8cNX7uO6t8f9KqqEk106E7Sy' //password
        ]);
        
        $userSS =  \App\Models\User::create([
            'name'      => 'Usuario San Salvador',
            'email'     => 'bitzide@bitzide.com',
            'oficina'   => 2,
            'password'  => '$2y$10$y/iGfCkpVSNf91ejekgaDuq7GEj7U8cNX7uO6t8f9KqqEk106E7Sy' //password
        ]);
        
        $userSSA =  \App\Models\User::create([
            'name'      => 'Administrador',
            'email'     => 'san_salvador_admin@bitzide.com',
            'oficina'   => 2,
            'password'  => '$2y$10$y/iGfCkpVSNf91ejekgaDuq7GEj7U8cNX7uO6t8f9KqqEk106E7Sy' //password
        ]);
        
        $userCH->assignRole('Usuaria/o');
        $userCH1->assignRole('Usuaria/o');
        $userCH2->assignRole('Usuaria/o');
        $userCH3->assignRole('Usuaria/o');
        $userCH4->assignRole('Usuaria/o');
        $userSS->assignRole('Super Administrador');
        $userSSA->assignRole('Administrador');
        
        
            //\App\Models\User::factory(200)->create();
        }
    }
    