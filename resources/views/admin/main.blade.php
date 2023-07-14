@extends('layouts.master-page-fluid')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--- Data Table -->
    <link type="text/css" href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link type="text/css" href="assets/libs/datatables.net-bs4/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <section id="about" class="about pt-0">
        @include('admin.result')
    </section>
@endsection
@section('script')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/short-urls-datatable.js"></script>

    <!--- Data Table -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            // for users
            $('#list-users-table').DataTable({
                "processing": true,
                "aaSorting": [],
                "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [7]
                    },
                    {
                        "bSearchable": false,
                        "aTargets": [7]
                    }
                ]
            });
            // for shorteneds
            $('#list-shortened-table').DataTable({
                "processing": true,
                "aaSorting": [],
                "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [6]
                    },
                    {
                        "bSearchable": false,
                        "aTargets": [6]
                    }
                ]
            });
        });
    </script>
@endsection
