<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('project_management.partial.styleLink')
    @stack('styles')
</head>

<body>
    <div class="container-scroller">
        @include('project_management.partial.header')
        <div class="container-fluid page-body-wrapper">
            @include('project_management.partial.sidebar')
            @yield('content')
        </div>
        @include('project_management.partial.footer')
    </div>
    @include('project_management.partial.jsLink')
    @stack('scripts')
</body>

</html>