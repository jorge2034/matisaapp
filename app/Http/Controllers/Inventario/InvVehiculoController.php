<?php

namespace App\Http\Controllers\Inventario;

use App\Archivo;
use App\Http\Controllers\Controller;

use App\InvMarca;
use App\InvVehiculo;
use Illuminate\Http\Request;
use App\Http\Requests\InvVehiculoRequest;

class InvVehiculoController extends Controller
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
        $estados = InvVehiculo::getArrayStatus();

        //dd($request);
        $filtro = count($request->toArray())?true:false;
        $invVehiculos = InvVehiculo::modelo($request->get('modeloF'))
            ->status($request->get('estadoF'))
            ->get();
        return view('inventario.vehiculos.index',['invVehiculos'=>$invVehiculos,'filtro'=>$filtro,'estados'=>$estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvVehiculoRequest $request)
    {
        if(!is_null($request->file('images'))){
            $arrayIds = Archivo::uploadMultipleFile($request->file('images'));
            $request->request->set('imagenes',json_encode($arrayIds));
        }
        $status = !is_null($request->input('status'))?InvVehiculo::ENABLED:InvVehiculo::DISABLED;
        $request->request->set('status',$status);
       // dd($request);
        $invVehiculos = InvVehiculo::create($request->all());
        return redirect()->route('inventario.vehiculos.create',$invVehiculos)
            ->with('info','Vehiculo guardada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvVehiculo  $invVehiculos
     * @return \Illuminate\Http\Response
     */
    public function show(InvVehiculo $invVehiculos)
    {
       // dd($invVehiculos);
        return view('inventario.vehiculos.show',compact('invVehiculos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvVehiculo  $invVehiculos
     * @return \Illuminate\Http\Response
     */
    public function edit(InvVehiculo $invVehiculos)
    {
        return view('inventario.vehiculos.edit',compact('invVehiculos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvVehiculo  $invVehiculos
     * @return \Illuminate\Http\Response
     */
    public function update(InvVehiculoRequest $request, InvVehiculo $invVehiculos)
    {
        if(!is_null($request->file('images'))){
            $arrayIds = Archivo::uploadMultipleFile($request->file('images'));
            $arrayIds = array_merge(json_decode($invVehiculos->imagenes),$arrayIds);
            $request->request->set('imagenes',json_encode($arrayIds));
        }
        $status = !is_null($request->input('status'))?InvVehiculo::ENABLED:InvVehiculo::DISABLED;
        $request->request->set('status',$status);
        $invVehiculos->update($request->all());
        return redirect()->route('inventario.vehiculos.edit',$invVehiculos->id)
            ->with('info','Vehiculo actualizado con exito');
    }

    /**
 * Remove the specified resource from storage.
 *
 * @param  \App\InvVehiculo  $invVehiculos
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $invVehiculos = InvVehiculo::find($id);
        $invVehiculos->delete();
        return response()->json([
            'success' => 'Registro eliminado exitosamente!'
        ]);
        // return back();//->with('info','Eliminado correctamente');
    }
}
