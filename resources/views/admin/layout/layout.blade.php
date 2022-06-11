<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>
          {{$title ?? "Mosque"}}
        </title>
        @include('admin.layout.styles')
    </head>

    <body class="bg-gray-200">
        @yield('section')
        @include('admin.layout.scripts')

    </body>

</html>
