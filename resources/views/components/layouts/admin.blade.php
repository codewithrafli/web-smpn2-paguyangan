<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - {{ $title ?? '' }}</title>
    <link rel="shortcut icon" href="{{ asset(getWebConfiguration()->logo) }}" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('plugin-styles')
    @stack('style')
</head>

<body>
    <div class="flex min-h-screen bg-[#FAFAFA]">
        <!-- Sidebar -->
        <x-admin.sidebar />

        <!-- Main Content -->
        <div class="h-screen w-full overflow-y-auto pt-[142px] px-4 lg:px-[30px]">
            <!-- Fixed Top Bar -->
            <div class="fixed left-0 lg:left-[270px] right-0 top-[30px] z-30 px-4 lg:px-[30px]">
                <x-admin.header />
            </div>

            @include('sweetalert::alert')

            <!-- Content -->
            <main class="flex w-full flex-col gap-[30px] py-[28px]">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @stack('plugin-scripts')
    @stack('custom-scripts')
</body>

</html>
