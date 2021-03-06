@extends('layouts.app')

@section('content')

	<h1>Editar Loja</h1>
<fieldset class="shadow p-3 mb-5 bg-white rounded">

	<form action="{{ route('admin.store.update',['store'=>$store->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PATCH")

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
            <fieldset>
                <legend>Logo da Loja</legend>
                @isset($store->logo)
                <p>
                    <img src="{{ asset('storage/'.$store->logo) }}" alt="">
                </p>
                @endisset
                <label for="">Selecionar Imagem</label>
                <input name="logo" type="file" class="form-control @error('logo') is-invalid @enderror">
                @error('logo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </fieldset>

        </div>

		<button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-sync-alt"></i><span class="pl-2">Atualizar Loja</span></button>
	</form>
</fieldset>

@endsection
