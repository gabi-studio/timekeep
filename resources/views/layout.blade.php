<!-- in laravel, we can have components like in react 
 we can create partials where you can show your views
 we can have a "layout" that all other files will use (header, footer)-->

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timekeeper Timesheets</title>
 </head>

 <Header>
    <!-- This is a placeholder for the header content -->
    @section('header')
    <nav>
    <ul>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('timekeepers.index') }}">Manage Timekeepers</a></li>
        <li><a href="{{ route('projects.index') }}">Manage Projects</a></li>
        <li><a href="{{ route('tasks.index') }}">Manage Tasks</a></li>
       
    </ul>
</nav>

    @show
 <body>
    <!-- yield means that this is a placeholder for the content that will be injected into this layout -->
    @yield('content') 
 </body>
 </html>