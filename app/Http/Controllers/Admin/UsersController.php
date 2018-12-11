<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
use App\Http\Requests\AdminUserCreateRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $all = Genaral::index('users');
        $table='Usuarios';
        $route='users';
        return view('admin.layouts.generalViewIndex', ['route'=>$route,'items' => $all['items'],'camps' => $all['camps'], 'table'=>$table]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(AdminUserCreateRequest $request)
    {

        $request->validated();

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'telephone' => $request['telephone'],
            'password' => Hash::make($request['password']),
            'rol'=>$request['rol'],
        ]);
        return redirect()->route('admin.users.show');
    }

    public function change($id)
    {
        $item = User::find($id);

        return view('admin.user.update',['item' => $item]);
    }

    public function update(AdminUserUpdateRequest $request,$id)
    {
        $request->validated();

        $item = User::find($id);

        if ($item) {

            $item->update($request->all());

            return redirect()->route('admin.users.show');
        } else {
            return Utils::reportarError('Error al intentar editas la empresa');
        }

    }

    public function delete($id)
    {
        User::find($id)->delete();

        return redirect(route('admin.users.show'));
    }

    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();

        return redirect(route('admin.users.show'));
    }
}
