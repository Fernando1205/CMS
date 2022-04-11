<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo</title>

    <style>

    </style>
</head>
<body style="margin: 0px; padding: 0px; background-color: #f3f3f3">
    <div
    style="width: 60%; max-width: 700px; display: block; margin: 0 auto; background-color: #ff291a">
        <img src="{{ asset('images/logo.png') }}" style="width: 15%; display: block; margin: auto">

        <div style="background: #fff; padding: 24px">
            @yield('content')
        </div>

    </div>
</body>
</html>
