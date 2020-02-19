@extends('layouts.app')

@section('content')

    @if (session('status'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sucesso!</strong> {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif

    <table class="table table-striped table-sm">

        <th>#</th>
        <th>Loja</th>
        <th>Ações</th>

        @foreach ($stores as $store)
            <tr>
                <td>{{ $store->id }}</td>
            <td>{{ $store->name }}</td>
                <td>
                    <a href="/admin/store/{{ $store->id }}/edit">Editar</a>
                    <a href="/admin/store/{{ $store->id }}/delete">Apagar</a>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $stores->links() }}
@endsection
