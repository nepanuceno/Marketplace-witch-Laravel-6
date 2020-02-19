<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        $stores = \App\Store::paginate(10);

        return view('admin.store.stores', compact('stores'));
    }

    public function create()
    {

        $users = \App\User::all();
        return view('admin.store.create', compact('users'));

    }

    public function store(Request $request)
    {
        $user = \App\User::find($request->user);

        return $user->store()->create($request->all());
    }

    public function edit($store)
    {
        $store = \App\Store::find($store);

        return view('admin.store.edit', compact('store'));
    }

    public function update(Request $request, $store)
    {

        $result = \App\Store::find($store);
        $result->update($request->all());

        return redirect('admin/store')->with('status','Loja modificada com sucesso!');
    }

    public function delete($store)
    {
        $store = \App\Store::destroy($store);

        return redirect('admin/store')->with('status','Loja Apagada com sucesso!');
    }
}
