@extends('layouts.app')

@section('content')

    @if(!$store)

    <a class="btn btn-primary mr-2 mb-5" href="{{ route('admin.store.create') }}"><i class="fas fa-store fa-2x pb-2"></i><span class="pl-2">Criar Loja</span></a>
    @else
        <table class="table table-striped table-sm mt-5">
            <th>#</th>
            <th>Loja</th>
            <th>Total de Produtos</th>
            <th>Ações</th>

                <tr>
                    <td>{{ $store->id }}</td>
                    <td>{{ $store->name }}</td>
                    <td>{{ count($store->products) }}</td>
                    <td>
                        <a href="{{ route('admin.store.edit',[$store->id]) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" data-toggle="tooltip" onclick="$(this).find('form').submit();" >
                            <i class="fas fa-trash"></i>
                            <form action="{{ route('admin.store.destroy',[$store->id]) }}" method="post">
                                @method("DELETE")
                                @csrf
                            </form>
                        </a>
                    </td>
                </tr>
        </table>
    @endif
@endsection
