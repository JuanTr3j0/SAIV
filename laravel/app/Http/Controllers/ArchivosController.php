<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Casos;
use App\Models\Archivos;
use App\Models\ArchivosCasos;

class ArchivosController extends Controller
{
    public function cargarArchivosCaso(Request $request)
    {
        try {
            // Obtener el caso asociado con la clave
            $caso = Casos::whereRaw('SHA1(id) = ?', [$request->key])->first()->id;
            $caso ??= null;

            if ($caso !== null) {
                $respuesta = $this->cargarArchivo($request);

                if ($respuesta !== null) {
                    DB::beginTransaction();

                    $archivo = Archivos::updateOrCreate(
                        [
                            'nombre_original' => $respuesta->nombre_original,
                            'nombre_unico' => $respuesta->nombre_unico
                        ]
                    );

                    ArchivosCasos::updateOrCreate([
                        "caso_fk" => $caso,
                        "archivo_fk" => $archivo->id
                    ]);

                    DB::commit();

                    $mensaje = ["mensaje" => "Se guardó el archivo " . $respuesta->nombre_original . " con éxito!"];
                } else {
                    $mensaje = ["error" => "Ups! Ocurrió un error"];
                }

                return response()->json($mensaje);
            } else {
                return response()->json(['aviso' => "No se recibió el caso para asociar los archivos"]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Línea -> ' . $e->getLine() . ' Error -> ' . $e->getMessage()]);
        }
    }

    public function showArchivosCasos($key)
    {
        return ArchivosCasos::whereRaw('SHA1(caso_fk) = ?', [$key])
            ->select([DB::raw('SHA1(archivos.id) as key'), 'archivos.nombre_unico as archivo'])
            ->join('archivos', 'archivos.id', '=', 'archivos_casos.archivo_fk')->get();
    }

    public function descargarArchivo($key)
    {
        $query = Archivos::whereRaw('SHA1(id) = ?', [$key]);

        if ($query->exists()) {
            $archivo = $query->first();
            $path = storage_path('app/public/archivos/');

            return response()->download($path . $archivo->nombre_unico, $archivo->nombre_original);
        } else {
            return response()->json(["aviso" => "No se encontró el archivo"]);
        }
    }

    public function eliminarArchivo($key)
    {
        try {
            $query = Archivos::whereRaw('SHA1(id) = ?', [$key])->first();

            if ($query === null) {
                return ["aviso" => "No se encontró el archivo"];
            }

            $this->eliminarArchivoPublic($query);

            if (!$query->delete()) {
                return ["aviso" => "No se borró el registro"];
            }

            return ["aviso" => "Se borró el archivo"];
        } catch (\Exception $exception) {
            return ['aviso' => $exception];
        }
    }

    public function eliminarArchivoCaso($key)
    {
        ArchivosCasos::whereRaw('SHA1(archivos_casos.archivo_fk) = ?', [$key])->delete();
        return response()->json($this->eliminarArchivo($key));
    }

    private function cargarArchivo(Request $request)
    {
        // Decodificar el archivo base64
        $fileData = $request->input('archivo');
        $fileName = $request->input('nombre');
        if (!is_null($fileData)) {
            // Separar los metadatos de la cadena base64
            $data = explode(',', $fileData);
            $fileContent = base64_decode($data[1]);

            $path = storage_path('app/public/archivos/');
            $nombre_original = $fileName;
            $nombre_unico = uniqid() . '.' . pathinfo($nombre_original, PATHINFO_EXTENSION);

            // Crear el directorio si no existe
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            // Guardar el archivo
            file_put_contents($path . $nombre_unico, $fileContent);

            return (object)[
                "nombre_original" => $nombre_original,
                "nombre_unico" => $nombre_unico
            ];
        } else {
            return null;
        }
    }

    private function eliminarArchivoPublic($archivo)
    {
        $path = storage_path('app/public/archivos/');
        if (file_exists($path . $archivo->nombre_unico)) {
            \File::delete($path . $archivo->nombre_unico);
        }
        return response()->json(["mensaje" => "Éxito se borró el archivo"], 200);
    }
}
