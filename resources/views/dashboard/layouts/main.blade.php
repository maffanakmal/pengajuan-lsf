<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan LSF | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    @include('dashboard.layouts.header')

    <div class="container-fluid">
        <div class="row">
            @include('dashboard.layouts.sidebar')

            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
                {{-- Main content section, to be filled by child views --}}
                @yield('dashboard-content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                searching: false, // Disable search
                paging: false, // Keep pagination if needed
                info: true, // Show table info if needed
                ordering: true // Enable/disable column ordering
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchIcon = document.getElementById('searchIcon');
            const searchBtn = document.getElementById('searchBtn');

            // Update button text based on input value
            searchInput.addEventListener('input', function() {
                if (searchInput.value) {
                    searchIcon.textContent = 'Hapus';
                    searchBtn.type = 'button'; // Change button type to a regular button
                } else {
                    searchIcon.textContent = 'Cari';
                    searchBtn.type = 'submit'; // Change button type back to submit
                }
            });

            // Clear the search field when 'X' is clicked
            searchBtn.addEventListener('click', function() {
                if (searchInput.value) {
                    searchInput.value = '';
                    searchIcon.textContent = 'Cari';
                    searchBtn.type = 'submit'; // Change button type back to submit
                    // Optionally, submit the form here to trigger a new search with empty value
                    this.form.submit();
                }
            });
        });
    </script>
</body>

</html>
