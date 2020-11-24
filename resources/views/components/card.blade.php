<div class="card" style="width: 80%;">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">
            {{ $subtitle }}
        </h6>
    </div>
    <ul class="list-group list-group-flush">
        @foreach($teams as $team)
            <li class="list-group-item">
                <p>
                    {{ $team }}
                </p>
            </li>
        @endforeach
    </ul>
</div>
