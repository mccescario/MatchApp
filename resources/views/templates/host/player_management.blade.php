@extends('templates.host.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Users</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="txt-purple m-0 fw-bold">Manage Users</p>
        </div>
        <div class="card-body">
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
                            <td>{{ $users->firstname }} {{ $users->lastname }}</td>
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
                        {{ $user->links() }}

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


