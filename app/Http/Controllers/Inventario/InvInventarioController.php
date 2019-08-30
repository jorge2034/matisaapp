<?php


namespace App\Http\Controllers\Inventario;
use App\Http\Controllers\Controller;
use App\InvInventario;
use Illuminate\Http\Request;
use App\Http\Requests\InvInventarioRequest;

class InvInventarioController extends Controller
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
        $estados = InvInventario::getArrayStatus();
        $filtro = count($request->toArray())?true:false;
        $invInventarios = InvInventario::nombre($request->get('nombreF'))
            ->descripcion($request->get('descripcionF'))
            ->status($request->get('estadoF'))
            ->get();
        return view('inventario.inventarios.index',['invInventarios'=>$invInventarios,'filtro'=>$filtro,'estados'=>$estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.inventarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvInventarioRequest $request)
    {
        $status = !is_null($request->input('status'))?InvInventario::ENABLED:InvInventario::DISABLED;
        $request->request->set('status',$status);
        $invInventarios = InvInventario::create($request->all());
        return redirect()->route('inventario.inventarios.create',$invInventarios)
            ->with('info','Registro guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvInventario  $invInventarios
     * @return \Illuminate\Http\Response
     */
    public function show(InvInventario $invInventarios)
    {
       // dd($invInventarios);
        return view('inventario.inventarios.show',compact('invInventarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvInventario  $invInventarios
     * @return \Illuminate\Http\Response
     */
    public function edit(InvInventario $invInventarios)
    {
        return view('inventario.inventarios.edit',compact('invInventarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvInventario  $invInventarios
     * @return \Illuminate\Http\Response
     */
    public function update(InvInventarioRequest $request, InvInventario $invInventarios)
    {
        $status = !is_null($request->input('status'))?InvInventario::ENABLED:InvInventario::DISABLED;
        $request->request->set('status',$status);
        $invInventarios->update($request->all());
        return redirect()->route('inventario.inventarios.edit',$invInventarios->id)
            ->with('info','Registro actualizado con exito');
    }

    /**
 * Remove the specified resource from storage.
 *
 * @param  \App\InvInventario  $invInventarios
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $invInventarios = InvInventario::find($id);
        $invInventarios->delete();
        return response()->json([
            'success' => 'Registro eliminado exitosamente!'
        ]);
    }
}
