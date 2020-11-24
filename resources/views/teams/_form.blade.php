
<div class="form-group" style="width: 30%; margin-left:20%">

    <label> Name </label>
    <input  class="form-control" name="name" type="text" placeholder="Enter Team" value="{{ old('name', $team->name ?? null) }}"> </input>

</div>

@if($errors->any())
  <ul>
     @foreach($errors->all() as $error)
         <li style="color: red"> {{ $error }} </li>
     @endforeach
  </ul>
@endif
