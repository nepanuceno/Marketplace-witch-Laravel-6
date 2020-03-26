<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use App\Product;
use App\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    private $products;
    public function __construct(Product $products)
    {
        $this->products = $products;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $products = $this->products->paginate(10);
        $userStore = Auth::user()->store;
        $products = $userStore->products()->paginate(10);

        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id','name']);
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    { //ProductRequest

        $data = $request->all();
        $store = Auth::user()->store;
        $product = $store->products()->create($data);
        $product->category()->sync($data['categories']);

        if($request->hasFile('photos')) {
            $images = $this->imageUpload($request, 'image');
            $product->photos()->createMany($images);
        }

        flash('Produto criado!')->success();

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('Veio no Show');
        return Product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->products->findOrFail($id);
        $categories = Category::all(['id','name']);


        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();
        $product = $this->products->findOrFail($product);
        $product->update($data);
        $product->category()->sync($data['categories']);

        if($request->hasFile('photos')) {
            $images = $this->imageUpload($request, 'image');
            $product->photos()->createMany($images);
        }

        flash('Produto alterado!')->success();

        return redirect()->route('admin.products.edit', ['product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->products->findOrFail($id)->delete();
        flash('Produto excluído!')->success();

        return redirect()->route('admin.products.index');
    }

    private function imageUpload(Request $request, $imageColumn)
    {
        $images = $request->file('photos');
        $uploadedImages = [];

        foreach ($images as $image) {
            $uploadedImages[] = [$imageColumn => $image->store('products','public')];
        }
        return $uploadedImages;
    }
}
