<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;
use App\Http\Requests\SaveUserRequest;
use App\Http\Controllers\Controller;
Use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('name')->paginate(5);
        //dd($users);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
          'name'        =>  $request->get('name'),
          'last_name'   =>  $request->get('last_name'),
          'email'       =>  $request->get('email'),
          'user'        =>  $request->get('user'),
          'password'    =>  $request->get('password'),
          'type'        =>  $request->get('type'),
          'active'      =>  $request->has('active') ? 1 : 0,
          'address'     =>  $request->get('address')
        ];
        $user = User::create($data);
        $message = $user ? 'Producto agregado exitosamente!' : 'No fue posible agregar el producto!';
        return redirect()->route('user.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $this->validate($request, [
          'name'      => 'required|max:100',
          'last_name' => 'required|max:100',
          'email'     => 'required|email',
          'user'      => 'required|min:4|max:20',
          'password'  => ($request->get('password') != "") ? 'required|confirmed' : "",
          'type'      => 'required|in:user,admin'
        ]);

        $user->name = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->user = $request->get('user');
        $user->type = $request->get('type');
        $user->address = $request->get('address');
        $user->active = $request->has('active') ? 1 : 0;
        if($request->get('password') != "") $user->password = $request->get('password');
        $update = $user->save();
        $message = $update ? 'Usuario actualizado correctamente!' : 'No fue posible actualizar al usuario!';
        return redirect()->route('user.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $deleted = $user->delete();
        $message = $deleted ? 'Usuario eliminado exitosamente!' : 'El usuario no pudo ser eliminado!';
        return redirect()->route('user.index')->with('message',$message);
    }
}
