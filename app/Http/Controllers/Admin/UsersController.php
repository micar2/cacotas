<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Genaral;
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

    public function change($id)
    {
        $item = User::find($id);

        return view('admin.users.update',['item' => $item]);
    }

    public function update(Request $request,$id)
    {
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
