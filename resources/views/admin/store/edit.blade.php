@extends('layouts.app')

@section('content')

	<h1>Criar Loja</h1>
<fieldset class="shadow p-3 mb-5 bg-white rounded">

	<form action="{{ route('admin.store.update',[$store->id]) }}" method="post">
        @method("PUT")
        @csrf
		<div class="form-group">
			<label for="">Nome da Loja</label>
		<input type="text" name="name" id="name" value="{{ $store->name }}" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Descrição</label>
			<input type="text" name="description" value="{{ $store->description }}" id="description"  class="form-control">
		</div>

		<div class="form-group">
			<label for="">Telefone</label>
			<input type="text" name="phone" value="{{ $store->phone }}" id="phone"  class="form-control">
		</div>

		<div class="form-group">
			<label for="">WhatsApp</label>
			<input type="text" name="mobile_phone" value="{{ $store->mobile_phone }}" id="mobile_phone"  class="form-control">
		</div>

		<div class="form-group">
			<label for="">Slug</label>
			<input type="text" name="slug" value="{{ $store->slug }}" id="slug"  class="form-control">
		</div>

		<button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-sync-alt"></i><span class="pl-2">Atualizar Loja</span></button>
	</form>
</fieldset>

@endsection
