<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    {{------------------ Header ------------------------------}}
    @include('Partials.header')
    {{------------------ Side Bar ------------------------------}}
    @include('Partials.sidebar')
    {{--------------------- Main Content ---------------------------------}}

    @yield('content')

    {{--------------------- Footer ---------------------------------}}

    @include('Partials.footer')
    @include('Partials.sidebarControl')

</div>
<!-- ./wrapper -->

@yield('js')
</body>
</html>
