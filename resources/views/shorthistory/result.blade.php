<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-0">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg></div>
                        Tables
                    </h1>
                    <div class="page-header-subtitle">An extension of the Simple DataTables library, customized for
                        SB Admin Pro</div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-n10">
    <div class="card mb-4">
        <div class="card-header">Short URLs History</div>
        <div class="card-body">
            <div class="table table-striped">
                <div class="datatable-container">
                    <table id="list-data-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Original (Url)</th>
                                <th scope="col">Shortened (Url)</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Expires Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ substr($value->original_url, 0, 30) }}...</td>
                                    <td>{{ $value->shortened_url }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->expires_at == '' || null ? '-' : $value->expires_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
