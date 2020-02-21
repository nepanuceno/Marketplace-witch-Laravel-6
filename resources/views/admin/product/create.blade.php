@extends('layouts.app')

@section('content')

<fieldset>
    <legend for="">Cadastrar Produto</legend>

    <form action="" method="post">
        <div class="form-group">
			<label for="">Nome da Loja</label>
		<input type="text" name="name" id="name" value="" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Descrição</label>
			<input type="text" name="description" value="" id="description"  class="form-control">
		</div>

		<div class="form-group">
			<label for="">Telefone</label>
			<input type="text" name="phone" value="" id="phone"  class="form-control">
		</div>

        <button class="btn btn-primary btn-lg" type="submit">Cadastrar</button>
    
    </form>
</fieldset>

@endsection