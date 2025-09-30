<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partial.styleLink')
    @stack('custom-style')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    @include('frontend.partial.header')
    @yield('page-content')
    @include('frontend.partial.footer')


    @stack('scripts')

    @include('frontend.partial.jsLink')

</body>

</html>