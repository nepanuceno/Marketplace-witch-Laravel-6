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
                    <a href="{{ route('admin.store.edit',[$store->id]) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                    <a href="#delete" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remover" onclick="document.querySelector('#delete_store').submit();" >
                        <i class="fas fa-trash"></i>
                        <form action="{{ route('admin.store.destroy',[$store->id]) }}" method="post" id="delete_store">
                            @method("DELETE")
                            @csrf
                        </form>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $stores->links() }}
@endsection
