<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">

        @include('partials.header')

        @if (Auth::check())
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="panel panel-default">
                            @include('partials.navigation')
                        </div>
                    </div>

                    <div class="col-md-10">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        @endif


    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>

    @yield('scripts')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
