@extends('layouts.app')

@section('content')

    <a class="btn btn-primary mr-2 mb-5" href="{{ route('admin.categories.create') }}">
        <i class="fas fa-boxes fa-2x pb-2"></i><span class="pl-2">Cadastrar Categoria</span>
    </a>

    <table class="table table-striped table-sm">
        <th>#</th>
        <th>Categoria</th>
        <th>Descrição</th>
        <th>Ações</th>

        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description  }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit',[$category->id]) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="left" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" data-toggle="tooltip" onclick="$(this).find('form').submit();" >
                        <i class="fas fa-trash"></i>
                        <form action="{{ route('admin.categories.destroy',[$category->id]) }}" method="post">
                            @method("DELETE")
                            @csrf
                        </form>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $categories->links() }}
@endsection

@section('javascript')
@endsection
