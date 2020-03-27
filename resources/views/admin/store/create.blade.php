@extends('layouts.app')

@section('content')

	<h1>Criar Loja</h1>

	<form action="{{ route('admin.store.store') }}" method="post" enctype="multipart/form-data">
        @csrf
		<div class="form-group">
			<label for="">Nome da Loja</label>
			<input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">

			@error('name')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror

		</div>

		<div class="form-group">
			<label for="">Descrição</label>
			<input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror">
			@error('description')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="form-group">
			<label for="">Telefone</label>
			<input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
			@error('phone')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="form-group">
			<label for="">WhatsApp</label>
			<input type="text" name="mobile_phone" id="mobile_phone" value="{{ old('mobile_phone') }}" class="form-control @error('mobile_phone') is-invalid @enderror">
			@error('mobile_phone')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="form-group">
            <label for="">Logo da Loja</label>
            <input name="logo" type="file" class="form-control">
        </div>

		<div class="form-group">
			<label for="">Slug</label>
			<input type="text" name="slug" id="slug"  class="form-control ">
		</div>

		<button type="submit" class="btn btn-success btn-lg">Salvar</button>
	</form>

@endsection
