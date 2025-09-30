<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partial.styleLink')
    @stack('custom-style')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="main-wrapper">
        @include('admin.partial.sidebar')
        <div class="page-wrapper">
            @include('admin.partial.header')
            @yield('page-content')
            @include('admin.partial.footer')
        </div>
    </div>

    @stack('scripts')

    @include('admin.partial.jsLink')

</body>

</html>