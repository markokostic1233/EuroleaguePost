@extends('layout')


@section('content')


<form method="POST" action="{{ route('teams.store') }}">
 @csrf
      @include('teams._form')
        <button style="width: 30%; margin-left:20%" type="submit"> Submit </button>

</form>



@endsection
