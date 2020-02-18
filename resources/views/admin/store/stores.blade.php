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
            <td>' '</td>
        </tr>
        
        
        @endforeach
    </table>

    {{ $stores->links() }}
@endsection