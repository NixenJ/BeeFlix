<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('custom.bootstrap5')
    <style> body {background-color: #f0f0f0;} </style>
</head>
<body>

    <div class = 'container-fluid shadow bg-body-tertiary rounded'>
        <div class = 'd-flex justify-content-between align-items-center bg-light fixed-top shadow bg-body-tertiary rounded'>
            <div class = 'navbar me-5'>
                @include('layout.navbar')
            </div>
        </div>
    </div>

    @yield('beeflix')

    <div class = 'footer'>
        @include('layout.footer')
    </div>
    @include('custom.bootstrapjs')
</body>
</html>
