@extends('layouts.app')

@section('content')

    <a class="btn btn-primary mr-2 mb-5" href="{{ route('admin.store.create') }}"><i class="fas fa-store fa-2x pb-2"></i><span class="pl-2">Criar Loja</span></a>  

    <table class="table table-striped table-sm">
        <th>#</th>
        <th>Loja</th>
        <th>Ações</th>

        @foreach ($stores as $store)
            <tr>
                <td>{{ $store->id }}</td>
            <td>{{ $store->name }}</td>
                <td>
                    <a href="{{ route('admin.store.edit',[$store->id]) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-edit fa-2x"></i></a>
                    <a href="{{ route('admin.store.destroy',[$store->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Remover"><i class="fas fa-trash fa-2x"></i></a>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $stores->links() }}
@endsection
