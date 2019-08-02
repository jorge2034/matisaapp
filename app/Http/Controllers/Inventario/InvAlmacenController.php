<?php


            namespace App\Http\Controllers\Inventario;
            use App\Http\Controllers\Controller;
            

use App\InvAlmacen;
use Illuminate\Http\Request;
use App\Http\Requests\InvAlmacenRequest;

class InvAlmacenController extends Controller
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
        $estados = InvAlmacen::getArrayStatus();
        $filtro = count($request->toArray())?true:false;
        $invAlmacenes = InvAlmacen::nombre($request->get('nombreF'))
            ->descripcion($request->get('descripcionF'))
            ->status($request->get('estadoF'))
            ->company(\Auth::user()->company_id)
            ->get();
        return view('inventario.almacenes.index',['invAlmacenes'=>$invAlmacenes,'filtro'=>$filtro,'estados'=>$estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.almacenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvAlmacenRequest $request)
    {
        $status = !is_null($request->input('status'))?InvAlmacen::ENABLED:InvAlmacen::DISABLED;
        $request->request->set('status',$status);
        $invAlmacenes = InvAlmacen::create($request->all());
        return redirect()->route('inventario.almacenes.create',$invAlmacenes)
            ->with('info','Registro guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvAlmacen  $invAlmacenes
     * @return \Illuminate\Http\Response
     */
    public function show(InvAlmacen $invAlmacenes)
    {
       // dd($invAlmacenes);
        return view('inventario.almacenes.show',compact('invAlmacenes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvAlmacen  $invAlmacenes
     * @return \Illuminate\Http\Response
     */
    public function edit(InvAlmacen $invAlmacenes)
    {
        return view('inventario.almacenes.edit',compact('invAlmacenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvAlmacen  $invAlmacenes
     * @return \Illuminate\Http\Response
     */
    public function update(InvAlmacenRequest $request, InvAlmacen $invAlmacenes)
    {
        $status = !is_null($request->input('status'))?InvAlmacen::ENABLED:InvAlmacen::DISABLED;
        $request->request->set('status',$status);
        $invAlmacenes->update($request->all());
        return redirect()->route('inventario.almacenes.edit',$invAlmacenes->id)
            ->with('info','Registro actualizado con exito');
    }

    /**
 * Remove the specified resource from storage.
 *
 * @param  \App\InvAlmacen  $invAlmacenes
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $invAlmacenes = InvAlmacen::find($id);
        $invAlmacenes->delete();
        return response()->json([
            'success' => 'Registro eliminado exitosamente!'
        ]);
    }
}
