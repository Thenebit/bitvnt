<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="{{ asset('event.css') }}" rel="stylesheet">
    <script src="{{ asset('event.js') }}"></script>

</head>
<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('event.dashboard') }}">{{ config('app.name', 'Laravel') }}</a>

	@auth
            <div class="ml-auto">
                <span class="navbar-text admin-text"><b>{{ Auth::user()->name }}</b></span>

                <a class="btn btn-outline-danger btn-sm ml-2"
		href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{__('Logout')}}</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
                                    </form>    
            </div>
	@endauth

        </div>
    </nav>

    <div>
        @yield('content')
    </div>

   <!-- Bottom Navbar -->
 <div class="footer">
        <a href ="{{ route('event.dashboard') }}"><i class="fas fa-home"></i></a>

        <a href ="{{ route('event.create') }}"><i class="fas fa-plus"></i></a>

        <a href ="{{ route('event.index') }}"><i class="fas fa-eye"></i></a>
  </div>

</body>
</html>
