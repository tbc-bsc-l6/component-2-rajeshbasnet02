<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;1,700&display=swap" rel="stylesheet">

</head>
<body class="antialiased">

@include('includes.header')

{{$slot}}

@include('includes.footer')

</body>
</html>
