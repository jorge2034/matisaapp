<?php


namespace App\Http\Controllers\Compras;
use App\Http\Controllers\Controller;
use App\ComRegistroComprasFactura;
use Illuminate\Http\Request;
use App\Http\Requests\ComRegistroComprasFacturaRequest;

class ComRegistroComprasFacturaController extends Controller
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
        $estados = ComRegistroComprasFactura::getArrayStatus();
        $filtro = count($request->toArray())?true:false;
        //dd($request->all());
        $comRegistroComprasFacturas = !is_null($request->input('estadoF'))?ComRegistroComprasFactura::status($request->get('estadoF')):ComRegistroComprasFactura::status(ComRegistroComprasFactura::ENABLED);
        $comRegistroComprasFacturas = $comRegistroComprasFacturas->nombre($request->get('nombreF'))
            ->descripcion($request->get('descripcionF'))
            ->company(\Auth::user()->company_id)
            ->get();


        return view('compras.registroComprasFacturas.index',['comRegistroComprasFacturas'=>$comRegistroComprasFacturas,'filtro'=>$filtro,'estados'=>$estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compras.registroComprasFacturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComRegistroComprasFacturaRequest $request)
    {
        $status = !is_null($request->input('status'))?$request->input('status'):ComRegistroComprasFactura::DISABLED;
        $request->request->set('status',$status);
        $comRegistroComprasFacturas = ComRegistroComprasFactura::create($request->all());
        return redirect()->route('compras.registroComprasFacturas.create',$comRegistroComprasFacturas)
            ->with('info','Registro guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComRegistroComprasFactura  $comRegistroComprasFacturas
     * @return \Illuminate\Http\Response
     */
    public function show(ComRegistroComprasFactura $comRegistroComprasFacturas)
    {
        //dd($comRegistroComprasFacturas);
        return view('compras.registroComprasFacturas.show',compact('comRegistroComprasFacturas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComRegistroComprasFactura  $comRegistroComprasFacturas
     * @return \Illuminate\Http\Response
     */
    public function edit(ComRegistroComprasFactura $comRegistroComprasFacturas)
    {
        return view('compras.registroComprasFacturas.edit',compact('comRegistroComprasFacturas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComRegistroComprasFactura  $comRegistroComprasFacturas
     * @return \Illuminate\Http\Response
     */
    public function update(ComRegistroComprasFacturaRequest $request, ComRegistroComprasFactura $comRegistroComprasFacturas)
    {
        $status = !is_null($request->input('status'))?$request->input('status'):"DISABLED";
        $request->request->set('status',$status);
        $comRegistroComprasFacturas->update($request->all());
        return redirect()->route('compras.registroComprasFacturas.edit',$comRegistroComprasFacturas->id)
            ->with('info','Registro actualizado con exito');
    }

    /**
 * Remove the specified resource from storage.
 *
 * @param  \App\ComRegistroComprasFactura  $comRegistroComprasFacturas
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $comRegistroComprasFacturas = ComRegistroComprasFactura::find($id);
        $comRegistroComprasFacturas->delete();
        return response()->json([
            'success' => 'Registro eliminado exitosamente!'
        ]);
    }
}
