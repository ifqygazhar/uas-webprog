<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ifqy gifha azhar">
    <title>Dashboard User</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    {{-- bootsrap icon    --}}
    <link rel="stylesheet" href="/css/bootstrap-icons.css">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" type="text/css" rel="stylesheet">
    {{--  trix editor   --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>
<body>

@include('dashboard.layout.header')

<div class="container-fluid">
    <div class="row">
@include('dashboard.layout.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            @yield('container')

        </main>
    </div>
</div>


<script src="/js/bootstrap.bundle.min.js"></script>

<script src="/js/feather.min.js"></script>
<script src="/js/dashboard.js"></script>
</body>
</html>
