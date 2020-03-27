@extends('layouts.app')

@section('content')

    <fieldset>
        <legend for="">Editar Produto</legend>

        <form action="{{ route('admin.products.update', ['product'=>$product->id]) }}" method="post" enctype="multipart/form-data">
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
                <label for="">Categoria</label>
                <select name="categories[]" class="form-control select2" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($product->category->contains($category)) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Fotos do produto</label>
                <input name="photos[]" type="file" class="form-control @error('photos') is-invalid @enderror"  multiple>

                @error('photos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" value="{{ $product->slug }}" id="slug"  class="form-control">
            </div>

            <button class="btn btn-primary btn-lg" type="submit">
                <i class="fas fa-save"></i><span class="pl-2">Salvar</span>
            </button>

        </form>
        <hr>

        <div class="row">
            @foreach($product->photos as $photo)
                <div class="col-4 text-center">
                    <img src="{{ asset('storage/'.$photo->image) }}" alt="" class="img-fluid">

                    <form action="{{route('admin.photo.remove')}}" method="post">
                        @csrf
                        <input type="hidden" name="photoName" value="{{ $photo->image }}">
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                </div>
            @endforeach
        </div>
    </fieldset>

@endsection
