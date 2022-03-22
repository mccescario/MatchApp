@extends('templates.host.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Users</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Manage Users</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                <option value="10" selected="">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>&nbsp;</label></div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Age</th>
                            <th>Birth date</th>
                            <th>Student No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                            <td>asdasd@email.com</td>
                            <td>BSITWMA</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>20181234</td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Course</strong></td>
                            <td><strong>Age</strong></td>
                            <td><strong>Birth date</strong></td>
                            <td><strong>Student No.</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!--    <div>
        <h1 style="padding: 20px 0px;">View User Details</h1>
    </div>

    <div>
        <a href="{{ url()->previous() }}" class="btn btn-bg-inverse mb-3 shadow"> Back</a>
    </div>

    <div class="container">

                <div class="row g-0">
                    <div class="col card shadow me-3">

                        <div class="card-header py-3">
                            <h5 class="color-green m-0 card-title">Player Details</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="ms-4 text-start card-title">
                                Full Name :  &nbsp;{{ $user->name }}</h6>
                            <h6 class="ms-4 text-start card-title">
                                E-Mail :&nbsp; {{ $user->email }}</h6>
                            <h6 class="ms-4 text-start card-title">
                                Address :</strong>&nbsp;{{ $user->address }} </h6>
                            <h6 class="ms-4 text-start card-title">
                                Contact Number :&nbsp;{{ $user->contact_number }} </h6>
                            <h6 class="ms-4 text-start card-title">
                                Civil Status :&nbsp;

                                @if ($user->status = 1)
                                    Single
                                @elseif ($user->status = 2)
                                    Married
                                @elseif ($user->status = 3)
                                    Widowed
                                @endif
                            </h6>
                        </div>


                    </div>


                    <div class="col card shadow">
                        <div class="card-header py-3 ">
                            <h5 class="color-green m-0 card-title ">Player Profile</h5>
                        </div>
                        <div class="mt-3 ms-4">
                            Player Profile Not Yet Updated

                        </div>


                    </div>
                </div>


    </div>

-->
@endsection
