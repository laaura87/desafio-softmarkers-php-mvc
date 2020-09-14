<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gerenciador de Contatos</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        
        
    </head>
    <body>  
      @yield('content')
      <script src="https://kit.fontawesome.com/6b50c4bfd1.js" crossorigin="anonymous"></script>
      <script src="{{ URL::asset('scripts/script.js') }}"></script>
    </body>
</html>
