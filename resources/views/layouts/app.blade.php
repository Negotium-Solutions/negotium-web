<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 grid grid-cols-2 items-center">
                    <div>
                        {{ $header }}
                    </div>
                    <div class="text-right">
                        <a href="?export=1" class="text-blue-600 hover:underline">Export to Excel</a>
                    </div>
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.toggle-contacted').on('click', function () {
                let button = $(this);
                let contactId = button.data('id');

                $.ajax({
                    url: "{{ route('contactList.toggleContacted', '') }}/" + contactId,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.success) {
                            let icon = button.find('i');
                            if (response.contacted) {
                                icon.removeClass('fa-times text-danger').addClass('fa-check text-success');
                            } else {
                                icon.removeClass('fa-check text-success').addClass('fa-times text-danger');
                            }
                            button.data('contacted', response.contacted);
                        }
                    }
                });
            });
        });
    </script>

    </body>
</html>
