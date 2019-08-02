<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\EmpresaRequest;
use Illuminate\Http\Request;

class EmpresaController extends Controller
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
        $estados = Company::getArrayStatus();

       // dd($request);
        $filtro = count($request->toArray())?true:false;
        $empresas = Company::nombre($request->get('nombreF'))
                    ->direccion($request->get('direccionF'))
                    ->telefono($request->get('telefonoF'))
                    ->status($request->get('estadoF'))
                    ->get();
        return view('empresas.index',['empresas'=>$empresas,'filtro'=>$filtro,'estados'=>$estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $status = !is_null($request->input('status'))?Company::ENABLED:Company::DISABLED;
        $request->request->set('status',$status);
        $empresa = Company::create($request->all());
        return redirect()->route('config.empresas.create',$empresa)
            ->with('info','Empresa guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $empresa)
    {
        return view('empresas.show',compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $empresa)
    {
        return view('empresas.edit',compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, Company $empresa)
    {
        $status = !is_null($request->input('status'))?Company::ENABLED:Company::DISABLED;
        $request->request->set('status',$status);
        $empresa->update($request->all());
        return redirect()->route('config.empresas.edit',$empresa->id)
            ->with('info','Empresa actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Company::find($id);
        $empresa->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
       // return back();//->with('info','Eliminado correctamente');
    }
}
