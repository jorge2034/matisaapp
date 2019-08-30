<?php

namespace App\Http\Controllers\Inventario;

use App\Archivo;
use App\Http\Controllers\Controller;

use App\InvMarca;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Requests\InvMarcaRequest;

class InvMarcaController extends Controller
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
        $estados = InvMarca::getArrayStatus();

        //dd($request);
        $filtro = count($request->toArray())?true:false;
        $invmarcas = InvMarca::nombre($request->get('nombreF'))
            ->descripcion($request->get('descripcionF'))
            ->status($request->get('estadoF'))
            ->company(\Auth::user()->company_id)
            ->get();

        return view('inventario.marcas.index',['invmarcas'=>$invmarcas,'filtro'=>$filtro,'estados'=>$estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvMarcaRequest $request)
    {
        if($request->hasFile('srcimage')){
            $path = $request->srcimage->store('public');
            $imagen= Archivo::create(['company_id'=>1,'nombre'=>$path,'ruta'=>$path]);
            $request->request->add(['archivo_id'=>$imagen->id]);
        }

       // dd($request);
        $status = !is_null($request->input('status'))?InvMarca::ENABLED:InvMarca::DISABLED;
        $request->request->set('status',$status);
        $invmarcas = InvMarca::create($request->all());
        return redirect()->route('inventario.marcas.create',$invmarcas)
            ->with('info','Marca guardada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvMarca  $invMarca
     * @return \Illuminate\Http\Response
     */
    public function show(InvMarca $invmarca)
    {
        return view('inventario.marcas.show',compact('invmarca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvMarca  $invMarca
     * @return \Illuminate\Http\Response
     */
    public function edit(InvMarca $invmarca)
    {
        return view('inventario.marcas.edit',compact('invmarca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvMarca  $invMarca
     * @return \Illuminate\Http\Response
     */
    public function update(InvMarcaRequest $request, InvMarca $invmarca)
    {
        if($request->hasFile('srcimage')){
            $path = $request->srcimage->store('public');
            $imagen= Archivo::create(['company_id'=>1,'nombre'=>$path,'ruta'=>$path]);
            $request->request->add(['archivo_id'=>$imagen->id]);
        }
        $status = !is_null($request->input('status'))?InvMarca::ENABLED:InvMarca::DISABLED;
        $request->request->set('status',$status);
        $invmarca->update($request->all());
        return redirect()->route('inventario.marcas.edit',$invmarca->id)
            ->with('info','Marca actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvMarca  $invMarca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invmarcas = InvMarca::find($id);
        $invmarcas->delete();
        return response()->json([
            'success' => 'Registro eliminado exitosamente!'
        ]);
        // return back();//->with('info','Eliminado correctamente');
    }
}
