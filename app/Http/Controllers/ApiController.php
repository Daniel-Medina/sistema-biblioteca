<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $autores = Autor::all();

        return \response()->json($autores, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $autor = Autor::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'foto' => null,
        ]);

        return \response()->json(['mensaje' => 'Correcto']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        //
        return \response()->json($autor, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        //
        $autor->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'foto' => null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        //
        $autor->update([
            'estatus' => 'OCULTO',
        ]);

        return \response()->json(['mensaje' => 'Correcto']);
    }
}
