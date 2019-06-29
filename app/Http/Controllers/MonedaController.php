<?php

namespace App\Http\Controllers;

use App\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monedas = Moneda::all();
        return view('param.monedas.index',['monedas'=>$monedas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('param.monedas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moneda = Moneda::create($request->all());
        return redirect()->route('parametros.monedas.edit',$moneda->id)
            ->with('info','Producto guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function show(Moneda $moneda)
    {
        return view('param.monedas.show',compact('moneda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function edit(Moneda $moneda)
    {
        return view('param.monedas.edit',compact('moneda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moneda $moneda)
    {
        $moneda->update($request->all());
        return redirect()->route('parametros.monedas.edit',$moneda->id)
            ->with('info','Producto actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moneda $moneda)
    {
        $moneda->delete();
        return back()->with('info','Eliminado correctamente');
    }
}
