<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        $stores = Store::paginate(10);
        return view('admin.store.stores', compact('stores'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.store.create', compact('users'));
    }

    public function store(Request $request)
    {
        $user = User::find($request->user);
        flash('Loja criada com sucesso!')->success();
        $user->store()->create($request->all());
        return redirect()->route('admin.store.index');
    }

    public function edit($store)
    {
        $store = Store::find($store);
        return view('admin.store.edit', compact('store'));
    }

    public function update(Request $request, $store)
    {
        $result = Store::find($store);
        $result->update($request->all());
        flash('Loja modificada com sucesso!')->success();
        return redirect()->route('admin.store.index');
    }

    public function destroy($store)
    {
        Store::destroy($store);
        flash('Loja removida com sucesso!')->success();
        return redirect()->route('admin.store.index');
    }
}
