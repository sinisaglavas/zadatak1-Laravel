<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
@include('layouts.partials.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @yield('main')
            </div>
        </div>
    </div>
</body>
</html>
