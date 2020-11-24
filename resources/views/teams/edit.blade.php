
@extends('layout')


@section('content')


<form method="POST" action="{{ route('teams.update', ['team' => $team->id]) }}">
    @csrf
    @method('PUT')
    <label> Name </label>
    <input name="name" type="text" placeholder="Enter Team" value="{{ old('name', $team->name ?? null) }}"> </input>

           <button type="submit"> Update </button>

   </form>

   @endsection

