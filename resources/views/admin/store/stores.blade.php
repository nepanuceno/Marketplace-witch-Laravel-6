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
                <a href="/admin/store/{{ $store->id }}/edit">Editar</a>
                <a href="/admin/store/{{ $store->id }}/delete">Apagar</a>
            </td>
        </tr>


        @endforeach
    </table>

    {{ $stores->links() }}
@endsection
