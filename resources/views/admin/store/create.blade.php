@extends('layouts.app')

@section('content')

	<h1>Criar Loja</h1>

	<form action="/admin/store/store" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label for="">Nome da Loja</label>
			<input type="text" name="name" id="name" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Descrição</label>
			<input type="text" name="description" id="description"  class="form-control">
		</div>

		<div class="form-group">
			<label for="">Telefone</label>
			<input type="text" name="phone" id="phone"  class="form-control">
		</div>

		<div class="form-group">
			<label for="">WhatsApp</label>
			<input type="text" name="mobile_phone" id="mobile_phone"  class="form-control">
		</div>

		<div class="form-group">
			<label for="">Slug</label>
			<input type="text" name="slug" id="slug"  class="form-control">
		</div>

		<div class="form-group">
			<label for="user"></label>
			<select name="user" id="user"  class="form-control">
				@foreach($users as $user)
					<option value="{{ $user->id }}">{{ $user->name }}</option>
				@endforeach
			</select>
		</div>

		<button type="submit" class="btn btn-success btn-lg">Salvar</button>
	</form>

@endsection
