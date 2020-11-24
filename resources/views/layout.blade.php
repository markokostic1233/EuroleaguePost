<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body class="neki">


    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <img style="height: 40px; " src="storage/liga.jpg" class="img-responsive">


    <nav class="my-2 my-md-0 mr-md-3">

         <a class="p-2 text-dark" href="{{ route('home') }}"> Euroleague </a>
         <a class="p-2 text-dark" href="{{ route('contact') }}"> Contact </a>
         <a class="p-2 text-dark" href="{{ route('teams.index') }}"> Team </a>
         <a class="p-2 text-dark" href="{{ route('teams.create') }}"> Add </a>

         @guest
           @if(Route::has('register'))
           <a class="p-2 text-dark" href="{{ route('register') }}"> Register </a>

           @endif
         <a class="p-2 text-dark" href="{{ route('login') }}"> Login </a>

         @else

           <a class="p-2 text-dark" href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Logout ({{ Auth::user()->name }}) </a>

           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none";>
               @csrf


           </form>
         @endguest

    </nav>

    </div>


       <div class="container">

       @if(session()->has('status'))

            <p style="color:red">
             {{ session()->get('status') }}

            </p>
       @endif

       </div>




       @yield('content')
       <script src="{{ mix('js/app.js') }}"></script>

    </div>

</body>
</html>
