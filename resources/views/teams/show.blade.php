@extends('layout')


@section('content')


        <h1> {{ $team->name }} </h1>

        @if((new Carbon\Carbon())->diffInMinutes($team->created_at) <10)
            @badge(['show' => true])
                New club!
            @endbadge
    @endif

        <p> {{ $team->created_at }}  </p>



        <h4> Comments </h4>

        @foreach($team->comments as $comment)
          <ul>
               <li> <p> {{ $comment->content }} </p>
                        <div class="text-muted">
                        Created {{ $comment->created_at->diffForHumans()}}
                        </div>
               </li>
          </ul>


        @endforeach

        @empty($comment->content)
            No comments yet
        @endempty


@endsection
