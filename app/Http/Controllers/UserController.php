<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
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

        $estados = User::getArrayStatus();
        $filtro = count($request->toArray())?true:false;
        $users = User::name($request->get('nameF'))
            ->lastname($request->get('lastnameF'))
            ->email($request->get('emailF'))
            ->status($request->get('estadoF'))
            ->with('company')
            ->get();
        return view('users.index',['users'=>$users,'filtro'=>$filtro,'estados'=>$estados]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users.create',compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = !is_null($request->input('status'))?User::ENABLED:User::DISABLED;
        $request->request->set('status',$status);
        $request->request->set('password',Hash::make($request->get('password')));
        $request->request->add(['fullname'=>'Jorge Ignacio Arce Angelo2']);
      //  dd($request);
        $user = User::create($request->all());
        return redirect()->route('config.users.create',$user)
            ->with('info','Usuario guardado con exito');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $status = !is_null($request->input('status'))?User::ENABLED:User::DISABLED;
        $request->request->set('status',$status);
        //actualice el usuario
        $user->update($request->all());
        //actualice los roles
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('config.users.edit',$user->id)
            ->with('info','Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
