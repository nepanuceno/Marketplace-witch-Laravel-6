@extends('layouts.app')

@section('content')

    <fieldset>
        <legend for="">Editar Produto</legend>

        <form action="{{ route('admin.products.update', ['product'=>$product->id]) }}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="">Nome do Produto</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Descrição</label>
                <input type="text" name="description" value="{{ $product->description }}" id="description"  class="form-control">
            </div>

            <div class="form-group">
                <label for="">Preço</label>
                <input type="text" name="price" value="{{ $product->price }}" id="price"  class="form-control">
            </div>

            <div class="form-group">
                <label for="">Sobre o Produto</label>
                <textarea name="body" id="body"  class="form-control" cols="30" rows="10">
                    {{ $product->body }}
                </textarea>
            </div>

            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" value="{{ $product->slug }}" id="slug"  class="form-control">
            </div>

            <button class="btn btn-primary btn-lg" type="submit">
                <i class="fas fa-save"></i><span class="pl-2">Salvar</span>
            </button>

        </form>
    </fieldset>

@endsection
