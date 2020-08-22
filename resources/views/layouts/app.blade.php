<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    h1{
        margin-left:auto;
        margin-right:auto;
    }
    .links>a{
    padding-left:100px;
    }
    body
    {
        background:#ffd;
    }
    input {
  width: 100%;
  padding: 12px 20px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.submit-button{
  width: 50%;
  background-color: #4CAF50;
  color: white;
  border: none;
  padding:8px;
  border-radius: 4px;
  cursor: pointer;
  margin-left:100px;
  margin-right:auto;
  margin-bottom:20px;
}
.desdesign{
    height: 200px;
    width: 40%;
}
.errordesign{
    color:red;
    font-size:15px;
}
.imagedesign{
   font-size:20px;
}
    
    </style>
</head>
<body class = "bg-light">
    <div id="app">
        @include('blog.nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
