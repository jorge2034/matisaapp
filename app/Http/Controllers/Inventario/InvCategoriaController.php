<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvCategoriaRequest;
use App\InvCategoria;
use Illuminate\Http\Request;

class InvCategoriaController extends Controller
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
    public function index(Request $request)
    {
        $estados = InvCategoria::getArrayStatus();

         //dd($request);
        $filtro = count($request->toArray())?true:false;
        $invcategorias = InvCategoria::nombre($request->get('nombreF'))
            ->descripcion($request->get('descripcionF'))
            ->status($request->get('estadoF'))
            ->get();

        return view('inventario.categorias.index',['invcategorias'=>$invcategorias,'filtro'=>$filtro,'estados'=>$estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvCategoriaRequest $request)
    {

        $invcategorias = InvCategoria::create($request->all());
        return redirect()->route('inventario.categorias.create',$invcategorias)
            ->with('info','Categoria guardada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvCategoria  $invCategoria
     * @return \Illuminate\Http\Response
     */
    public function show(InvCategoria $invcategoria)
    {
        return view('inventario.categorias.show',compact('invcategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvCategoria  $invCategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(InvCategoria $invcategoria)
    {
        return view('inventario.categorias.edit',compact('invcategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvCategoria  $invCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(InvCategoriaRequest $request, InvCategoria $invcategoria)
    {
        $invcategoria->update($request->all());
        return redirect()->route('inventario.categorias.edit',$invcategoria->id)
            ->with('info','Categoria actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvCategoria  $invCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invcategorias = InvCategoria::find($id);
        $invcategorias->delete();
        return response()->json([
            'success' => 'Registro eliminado exitosamente!'
        ]);
        // return back();//->with('info','Eliminado correctamente');
    }
}
