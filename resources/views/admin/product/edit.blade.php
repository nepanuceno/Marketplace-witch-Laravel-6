@extends('layouts.app')

@section('content')

<fieldset>
    <label for="">Cadastrar Produto</label>

    <form action="" method="post">
        <div class="form-group">
			<label for="">Nome da Loja</label>
		<input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Descrição</label>
			<input type="text" name="description" value="{{ $product->description }}" id="description"  class="form-control">
		</div>

		<div class="form-group">
			<label for="">Telefone</label>
			<input type="text" name="phone" value="{{ $product->price }}" id="phone"  class="form-control">
		</div>
    
    </form>
</fieldset>

@endsection;