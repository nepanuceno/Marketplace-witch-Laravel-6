@extends('layouts.app')

@section('content')

    <fieldset>
        <legend for="">Editar Categoria</legend>

        <form action="{{ route('admin.categories.update', ['category'=>$category->id]) }}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="">Nome da Categoria</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Descrição</label>
                <input type="text" name="description" value="{{ $category->description }}" id="description"  class="form-control">
            </div>

            <button class="btn btn-primary btn-lg" type="submit">
                <i class="fas fa-save"></i><span class="pl-2">Salvar</span>
            </button>

        </form>
    </fieldset>

@endsection
