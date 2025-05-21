<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use app\Models\Comuna;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use illuminate\Http\Request;

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

        return json_encode(['comunas'=>$comunas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comuna = new User();
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
         $comuna = User::find($id);
       if (is_null($comuna)) {
          return abort(404);
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $comuna = User::find($id);
       if (is_null($comuna)) {
          return abort(404);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comuna = User::find($id);
       if (is_null($comuna)) {
          return abort(404);
       }
    }
}
