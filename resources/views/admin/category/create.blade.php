@extends('layouts.app')

@section('content')

<fieldset>
    <legend for="">Cadastrar Categorias</legend>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
			<label for="">Nome da Categoria</label>
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
            <label for="">Slug</label>
            <input type="text" name="slug" value="" id="slug"  class="form-control">
        </div>

        <button class="btn btn-primary btn-lg" type="submit">
            <i class="fas fa-plus"></i><span class="pl-2">Cadastrar</span>
        </button>
    </form>
</fieldset>

@endsection
