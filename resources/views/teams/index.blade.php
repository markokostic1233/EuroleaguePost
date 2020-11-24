@extends('layout')


@section('content')
<div class="row">

<div class="col-8">



@forelse($teams as $team)


<table class="col-lg-5 " style="margin-left:15%">
    <tr>
      <td>


        <a class="{{ $team->trashed() ? 'text-muted' : '' }}" href="{{ route('teams.show', ['team' => $team->id]) }}">  {{ $team->name }}

        </a>

        <p>
            Added {{ $team->created_at->diffForHumans() }} by {{ $team->user->name }}
        </p>



       @if($team->comments_count)

          <p class="text-muted"> {{ $team->comments_count }} comments </p>

          @else
          <p> No comments yet </p>
       @endif
      </td>

      <td>




@can('delete', $team)

       <form method="POST" action="{{ route('teams.destroy', ['team' => $team->id]) }}">
        @csrf
            @method('DELETE')

           <button class="btn btn-link" type="submit"> Delete </button>

       </form>

   @endcan

      {{--  @cannot('delete', $team)
           <p> You can not delete this post </p>
      @endcannot  --}}


      </td>
      <td>
<ul>
@auth

    @can('update', $team)

    <a class="btn btn-link" href="{{ route('teams.edit', ['team' => $team->id]) }}" > Edit </a>

    @endcan

@endauth


</ul>
      </td>
    </tr>
</table>
@empty

 No more Team!

@endforelse

</div>
<div class="col-4">
    <div class="container">
    <div class="row">
    <div class="card" style="width: 80%;">
        <div class="card-body">
            <h5 class="card-title">Most Commented</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Clubs
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($mostCommented as $team)
                <li class="list-group-item">
                    <p>
                <a href="{{ route('teams.show', ['team' => $team->id]) }}"> {{ $team->name }}</a>
                    </p>
                </li>
            @endforeach
        </ul>
    </div>
    </div>

<br>
    <div class="row">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <h5 class="card-title">Most Active</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                   Users with most posts
                </h6>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($mostActive as $user)
                    <li class="list-group-item">
                      {{ $user->name }}
                    </li>
                @endforeach
            </ul>
        </div>
        </div>

<br>
        <div class="row">
            <div class="card" style="width: 80%;">
                <div class="card-body">
                    <h5 class="card-title">Most active users last month</h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                       Users with most teams last month
                    </h6>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($mostActiveLastMonth as $user)
                        <li class="list-group-item">
                          {{ $user->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
            </div>


    </div>
</div>
</div>
@endsection('content')
