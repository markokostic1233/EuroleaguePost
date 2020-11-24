





@extends('layout')


@section('content')

<table class="table table-hover">
    <thead>
        <tr>
            <th>Id </th>
            <th>Name </th>
        </tr>

    </thead>
    <tbody>
        @foreach($home as $homes)
        <tr>
           <td> {{ $homes->id }}</td>
           <td> {{ $homes->player }}</td>
        </tr>

        @endforeach



    </tbody>
</table>

@endsection
