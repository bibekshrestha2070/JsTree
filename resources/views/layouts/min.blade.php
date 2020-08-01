<!DOCTYPE html>
<html>
<head>

        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Project</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>

    @include('layouts.min.style')
    @stack('styles')
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>

@yield('content')
@include('layouts.min.scripts')


@stack('scripts')



</body>
</html>