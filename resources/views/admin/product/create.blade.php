@extends('layouts.app')

@section('content')

<fieldset>
    <legend for="">Cadastrar Produto</legend>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
			<label for="">Nome do Produto</label>
		<input type="text" name="name" id="name" value="" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">

        @error('name')

            <div class="invalid-feedback">
                {{ $message}}
            </div>
        @enderror
		</div>

		<div class="form-group">
			<label for="">Descrição</label>
			<input type="text" name="description" value="{{ old('description') }}" id="description"  class="form-control @error('description') is-invalid @enderror">

            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
		</div>

		<div class="form-group">
			<label for="">Preço</label>
			<input type="text" name="price" value="{{ old('price') }}" id="price"  class="form-control @error('price') is-invalid @enderror">
            @error('price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
		</div>

        <div class="form-group">
            <label for="">Sobre o Produto</label>
            <textarea name="body" value="{{ old('body') }}" id="body"  class="form-control @error('price') is-invalid @enderror" cols="30" rows="10"></textarea>
            @error('body')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Categoria</label>
            <select name="categories[]" class="form-control select2" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
            <input name="photos[]" type="file" class="form-control" multiple>
        </div>

        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" value="" id="slug"  class="form-control">
        </div>

        <button class="btn btn-primary btn-lg" type="submit">
            <i class="fas fa-plus"></i><span class="pl-2">Cadastrar</span>
        </button>

    </form>
</fieldset>

@endsection
