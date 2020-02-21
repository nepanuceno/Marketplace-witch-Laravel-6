@extends('layouts.app')

@section('content')

<fieldset>
    <legend for="">Cadastrar Produto</legend>

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="form-group">
			<label for="">Nome do Produto</label>
		<input type="text" name="name" id="name" value="" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Descrição</label>
			<input type="text" name="description" value="" id="description"  class="form-control">
		</div>

		<div class="form-group">
			<label for="">Preço</label>
			<input type="text" name="price" value="" id="price"  class="form-control">
		</div>

        <div class="form-group">
            <label for="">Sobre o Produto</label>
            <textarea name="body" value="" id="body"  class="form-control" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" value="" id="slug"  class="form-control">
        </div>

        <div class="form-group">
            <label for="store">Lojas</label>
            <select name="store" id="store" class="form-control">
                @foreach($stores as $store)
                <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary btn-lg" type="submit">
            <i class="fas fa-plus"></i><span class="pl-2">Cadastrar</span>
        </button>

    </form>
</fieldset>

@endsection
