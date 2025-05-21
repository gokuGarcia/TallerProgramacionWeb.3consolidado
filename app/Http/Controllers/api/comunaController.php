<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use app\Models\Comuna;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class comunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.*', "tb_municipio.muni_nomb")
            ->get();

        return response()-> json(['comunas'=>$comunas], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    /*    $validate = validator($request->all(), [
            'comu_nomb' => ['required', 'max:30', 'unique'],
            'muni_codi' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'mgs' => 'Se produjo un error en la validacion de la información',
            'statusCode' => 400
        ]);
        }*/

        $comuna = new comuna();
        $comuna->comu_nomb = $request->comu_nomb;
        $comuna->muni_codi = $request->muni_codi;
        $comuna->save();

        return json_encode(['comuna'=>$comuna]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $comuna = comuna::find($id);
         $municipios = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();

            return response()->json(['comuna' => $comuna, 'municipios' => $municipios]);
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

         $validate = validator($request->all(), [
            'comu_nomb' => ['required', 'max:30', 'unique'],
            'muni_codi' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'mgs' => 'Se produjo un error en la validacion de la información',
            'statusCode' => 400
        ]);
        }

         $comuna = comuna::find($id);
       if (is_null($comuna)) {
          return abort(404);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comuna = comuna::find($id);
       if (is_null($comuna)) {
          return abort(404);
       }
    }
}
