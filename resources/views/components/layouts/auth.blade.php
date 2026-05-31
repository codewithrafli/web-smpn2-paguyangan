<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $attributes->get('title') }}</title>
    <link rel="shortcut icon" href="{{ asset(getWebConfiguration()->logo) }}" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('plugin-styles')
    @stack('style')
</head>

<body>
    @include('sweetalert::alert')
    {{ $slot }}

    @stack('plugin-scripts')
    @stack('custom-scripts')
</body>

</html>
