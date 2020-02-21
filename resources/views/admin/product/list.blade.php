@extends('layouts.app')

@section('content')

    <a class="btn btn-primary mr-2 mb-5" href="{{ route('admin.products.create') }}">
        <i class="fas fa-boxes fa-2x pb-2"></i><span class="pl-2">Cadastrar Produto</span>
    </a>

    <table class="table table-striped table-sm">
        <th>#</th>
        <th>Produto</th>
        <th>Preço</th>
        <th>Ações</th>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
                <td>R$ {{ number_format($product->price, 2,',','.') }}</td>
                <td>
                    <a href="{{ route('admin.products.edit',[$product->id]) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="left" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" data-toggle="tooltip" onclick="$(this).find('form').submit();" >
                        <i class="fas fa-trash"></i>
                        <form action="{{ route('admin.products.destroy',[$product->id]) }}" method="post">
                            @method("DELETE")
                            @csrf
                        </form>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $products->links() }}
@endsection
