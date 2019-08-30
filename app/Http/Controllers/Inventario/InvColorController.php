<?php


            namespace App\Http\Controllers\Inventario;
            use App\Http\Controllers\Controller;
            

use App\InvColor;
use Illuminate\Http\Request;
use App\Http\Requests\InvColorRequest;

class InvColorController extends Controller
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
        $estados = InvColor::getArrayStatus();
        $filtro = count($request->toArray())?true:false;
        $invColores = InvColor::nombre($request->get('nombreF'))
            ->descripcion($request->get('descripcionF'))
            ->status($request->get('estadoF'))
            ->get();
        return view('inventario.colores.index',['invColores'=>$invColores,'filtro'=>$filtro,'estados'=>$estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.colores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvColorRequest $request)
    {
        $status = !is_null($request->input('status'))?InvColor::ENABLED:InvColor::DISABLED;
        $request->request->set('status',$status);
        $invColores = InvColor::create($request->all());
        return redirect()->route('inventario.colores.create',$invColores)
            ->with('info','Registro guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvColor  $invColores
     * @return \Illuminate\Http\Response
     */
    public function show(InvColor $invColores)
    {
       // dd($invColores);
        return view('inventario.colores.show',compact('invColores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvColor  $invColores
     * @return \Illuminate\Http\Response
     */
    public function edit(InvColor $invColores)
    {
        return view('inventario.colores.edit',compact('invColores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvColor  $invColores
     * @return \Illuminate\Http\Response
     */
    public function update(InvColorRequest $request, InvColor $invColores)
    {
        $status = !is_null($request->input('status'))?InvColor::ENABLED:InvColor::DISABLED;
        $request->request->set('status',$status);
        $invColores->update($request->all());
        return redirect()->route('inventario.colores.edit',$invColores->id)
            ->with('info','Registro actualizado con exito');
    }

    /**
 * Remove the specified resource from storage.
 *
 * @param  \App\InvColor  $invColores
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $invColores = InvColor::find($id);
        $invColores->delete();
        return response()->json([
            'success' => 'Registro eliminado exitosamente!'
        ]);
    }
}
