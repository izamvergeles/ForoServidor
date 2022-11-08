<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>laravel - dwes - {{ $table ?? 'bikes'}}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="bg-dark">
        <nav class="navbar navbar-expand-sm bg-info navbar-dark justify-content-center fixed-bottom">
            <a class="navbar-brand" href="{{ url('') }}">F1ro</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <ul class="navbar-nav">
                    @if(session()->has('user'))
                        <li class="nav-item {{$activeHome ?? ''}}">
                            <a class="nav-link" href="{{ url('') }}">Home</a>
                        </li>
                        <li class="nav-item {{$activePosts ?? ''}}">
                            <a class="nav-link" href="{{ url('post') }}">Posts</a>
                        </li>
                        <li class="nav-item {{$activePost ?? ''}}">
                            <a class="nav-link" href="{{ url('mypost') }}">MyPost</a>
                        </li>
                        <li class="nav-item {{$activeComment ?? ''}}">
                            <a class="nav-link" href="{{ url('mycomment') }}">MyComments</a>
                        </li>
                        
                    @endif
                </ul>
        </nav>
        @yield('modalContent')
        <main>
            <div class="p-4 bg-info ">
                <h4 class="display-4 text-white margin-left">{{ $title ?? 'F1ro' }}</h4>
            </div>
            @if(session()->has('message'))
                    <div class="alert alert-primary" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif
            
              @yield('content')
            
            
        </main>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        @yield('scripts')
    </body>
</html>