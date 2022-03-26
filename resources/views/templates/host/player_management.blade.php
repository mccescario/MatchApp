@extends('templates.host.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Users(Pagination needs work to be updated by MC)</h3>
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
                    @if (count($user) > 0)
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Birth date</th>
                            <th>Student No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $users)
                        @if ($users->role > 2)
                        <tr>
                            <td>
                                <img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->course }}</td>
                            <td>{{ $users->birthdate }}</td>
                            <td>{{ $users->student_number }}</td>
                        </tr>
                        @endif
                        @endforeach
                    @else
                        <h3>No Records Available!</h3>
                        <hr>
                    @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Course</strong></td>
                            <td><strong>Birth date</strong></td>
                            <td><strong>Student No.</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">

                </div>
                <div class="col-md-6">
                    <nav class=" d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers" style="height: 20px">
                        {!! $user->links() !!}

                        <!--<ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>-->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


