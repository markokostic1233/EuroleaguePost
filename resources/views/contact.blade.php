@extends('layout')


@section('content')


<h1> Contact </h1>

@can('home.secret')


 <form style="width: 20%" class="form-group" method="POST" action="{{ ('/secret') }}">
    @csrf
<label>Players </label>
<input type="text" name="player" placeholder="Enter name" class="form-control" />
<br>
<button name="submit" type="submit" class="btn btn-primary" >Submit </button>
</form>

<a href="{{ route('pla') }}">
 <img style="height: 100px; margin-left:10% " src="storage/kk.png" class="img-responsive">
</a>


@endcan




@endsection
