@extends('layouts.app')

@section('content')

    <table class="table table-striped table-sm">
        <th>#</th>
        <th>Loja</th>
        <th>Ações</th>

        @foreach ($stores as $store)
            <tr>
                <td>{{ $store->id }}</td>
            <td>{{ $store->name }}</td>
                <td>
                    <a href="{{ route('admin.store.edit',[$store->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-edit fa-2x"></i></a>
                    <a href="{{ route('admin.store.destroy',[$store->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Remover"><i class="fas fa-trash fa-2x"></i></a>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $stores->links() }}
@endsection
