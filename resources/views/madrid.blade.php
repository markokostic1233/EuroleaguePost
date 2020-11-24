@extends('layout')


@section('content')


<h1> Contact </h1>



 <form style="width: 20%" class="form-group" method="POST" action="{{ ('/secretmadrid') }}" />
    @csrf
<label>Madrid players </label>
<input type="text" name="player_two" class="form-control" />
<br>
<button name="submit" type="submit" class="btn btn-primary" >Submit </button>
</form>









@endsection
