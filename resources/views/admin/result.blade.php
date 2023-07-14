<header class="page-header page-header-dark bg-gradient-primary-to-secondary mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-life-buoy">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="4"></circle>
                                <line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line>
                                <line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line>
                                <line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line>
                                <line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line>
                                <line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line>
                            </svg></div>
                        Knowledge Base
                    </h1>
                    <div class="page-header-subtitle">What are you looking for? Our knowledge base is here to help.
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <div class="row">
        <div class="col-lg-4 mb-4">
            <!-- Billing card 1-->
            <div class="card h-100 border-start-lg border-start-primary">
                <div class="card-body">
                    <div class="small text-muted">Users</div>
                    <div class="h3">{{ $overviews['user'] }}</div>
                    <a class="text-arrow-icon small" href="#!">
                        More
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-arrow-right">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <!-- Billing card 2-->
            <div class="card h-100 border-start-lg border-start-secondary">
                <div class="card-body">
                    <div class="small text-muted">Shortened URls</div>
                    <div class="h3">{{ $overviews['shortenedUrl'] }}</div>
                    <a class="text-arrow-icon small text-secondary" href="#!">
                        More
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-arrow-right">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <!-- Billing card 3-->
            <div class="card h-100 border-start-lg border-start-success">
                <div class="card-body">
                    <div class="small text-muted">Shortened Expires</div>
                    <div class="h3 d-flex align-items-center">{{ $overviews['shortExpiresDate'] }}</div>
                    <a class="text-arrow-icon small text-success" href="#!">
                        More
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-arrow-right">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Payment methods card-->
    <div class="card card-header-actions mb-4">
        <div class="card-header">
            User Lists
            <button class="btn btn-sm btn-primary" type="button">+Add</button>
        </div>
        <div class="card-body px-0">
            <div class="table table-striped">
                <div class="datatable-container">
                    <table id="list-users-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Date Register</th>
                                <th scope="col">Shortened URls (QTY)</th>
                                <th scope="col">Shortened Expires (QTY)</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}...</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->total_shortened_urls }}</td>
                                    <td>{{ $value->total_shortened_urls_expires }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <button class="btn btn-outline-primary btn-icon rounded-0 me-2 btn-sm"><i
                                                    class="fa fa-edit"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Billing history card-->
    <div class="card mb-4">
        <div class="card-header">Shortened Lists</div>
        <div class="card-body p-0">
            <div class="table table-striped">
                <div class="datatable-container">
                    <table id="list-shortened-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Original (Url)</th>
                                <th scope="col">Shortened (Url)</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Expires Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shortenedLists as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->user->username }}</td>
                                    <td>{{ substr($value->original_url, 0, 30) }}...</td>
                                    <td>{{ $value->shortened_url }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->expires_at == '' || null ? '-' : $value->expires_at }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <button class="btn btn-outline-primary btn-icon rounded-0 me-2 btn-sm"><i
                                                    class="fa fa-edit"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
