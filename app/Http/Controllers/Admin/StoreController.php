<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class StoreController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
       $this->middleware('user.has.store')->only(['create', 'store']);
    }

    public function index()
    {
        $store = Auth()->user()->store;
        return view('admin.store.stores', compact('store'));
    }

    public function create()
    {
        //$users = User::all();
        return view('admin.store.create');
    }

    public function store(StoreRequest $request)
    {

        $store = Auth()->user()->store();
        $store->create($request->all());
        //dd($store);

        if($request->hasFile('logo')) {
            $date['logo'] = $this->imageUpload($request);
        }

        flash('Loja criada com sucesso!')->success();
        return redirect()->route('admin.store.index');
    }

    public function edit($store)
    {
        $store = Store::find($store);
        return view('admin.store.edit', compact('store'));
    }

    public function update(StoreRequest $request, $store)
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
