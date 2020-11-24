<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\TeamRequest;
use Illuminate\Http\Request;
use App\Team;
use App\User;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Gate;


class TeamController extends Controller
{
public function __construct()
{
    $this->middleware('auth')
    ->only(['create', 'store', 'edit', 'update', 'destroy']);
}

    public function index(){



        return view('teams.index', [
            'teams' => Team::latest()->withCount('comments')->with('user')->get(),
            'mostCommented' => Team::mostCommented()->take(3)->get(),
            'mostActive' => User::withMostTeams()->take(3)->get(),
            'mostActiveLastMonth' => User::withMostTeamsLastMonth()->take(1)->get(),
            ]);
    }

    public function show($id){

          return view('teams.show', ['team' => Team::with('comments')->findOrFail($id)]);
    }

    public function create(){
       // $this->authorize('create');
        return view('teams.create');
    }

    public function store(TeamRequest $request){

        $validatedData = $request->validated();
        $validatedData['user_id'] = $request->user()->id;
        $team = Team::create($validatedData);

        $request->session()->flash('status', 'Team inserted successfully');
        return redirect()->route('teams.show', ['team' => $team->id]);

    }
    public function destroy(Request $request, $id){

       $team = Team::findOrFail($id);

     $this->authorize($team);

       $team->delete();

       $request->session()->flash('status', 'Team deleted successfully');
       return redirect()->route('teams.index');

    }

    public function edit($id){

        $team = Team::findOrFail($id);

        $this->authorize($team);


        //$validatedData = $request->validated();

        return view('teams.edit', ['team' => $team]);



    }

    public function update(TeamRequest $request, $id){



        $team = Team::findOrFail($id);

        $this->authorize($team);


        $validatedData = $request->validated();

        $team->fill($validatedData);
        $team->save();
        $request->session()->flash('status', 'Team updated successfully');
        return redirect()->route('teams.show', ['team' => $team->id]);

    }


}
