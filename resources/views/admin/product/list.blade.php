@extends('layouts.app')

@section('content')

    <a class="btn btn-primary mr-2 mb-5" href="{{ route('admin.product.create') }}"><i class="fas fa-boxes fa-2x pb-2"></i><span class="pl-2">Cadastrar Produto</span></a>  

    <table class="table table-striped table-sm">
        <th>#</th>
        <th>Produto</th>
        <th>Ações</th>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
                <td>
                    <a href="{{ route('admin.product.edit',[$product->id]) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-edit fa-2x"></i></a>
                    <a href="{{ route('admin.product.destroy',[$product->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Remover"><i class="fas fa-trash fa-2x"></i></a>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $products->links() }}
@endsection
