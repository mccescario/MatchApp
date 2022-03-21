@extends('templates.host.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Teams</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">View Teams</p>
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
                            <th style="width: 400px;">Name</th>
                            <th style="width: 100px;">Type</th>
                            <th style="width: 150px;">Game</th>
                            <th style="width: 100px;">Members</th>
                            <th style="width: 220px;">Captain</th>
                            <th style="width: 120px;">Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 264.828px;">Team ABAI</td>
                            <td>Sports</td>
                            <td>Basketball</td>
                            <td>13</td>
                            <td>Marthen Christ C. Escario</td>
                            <td>3/28/2022</td>
                        </tr>
                        <tr>
                            <td>Team BSITWMA</td>
                            <td>Sports<br></td>
                            <td>Basketball</td>
                            <td>14</td>
                            <td>Jhervie T. Tumaliuan<br></td>
                            <td>3/30/2022<br></td>
                        </tr>
                        <tr>
                            <td>Team BSITAGD</td>
                            <td>Sports<br></td>
                            <td>Basketball<br></td>
                            <td>12</td>
                            <td>Mark Joseph A. Granada<br></td>
                            <td>2/23/2021</td>
                        </tr>
                        <tr>
                            <td>Team BSITSMBA</td>
                            <td>Sports<br></td>
                            <td>Basketball</td>
                            <td>15</td>
                            <td>Angelo U. Payod<br></td>
                            <td>11/24/2021</td>
                        </tr>
                        <tr>
                            <td>Team BSITDA</td>
                            <td>Sports<br></td>
                            <td>Basketball<br></td>
                            <td>15</td>
                            <td>Firstname X. Surname</td>
                            <td>10/10/2020<br></td>
                        </tr>
                        <tr>
                            <td>Team Civil Engineering</td>
                            <td>eSports<br></td>
                            <td style="width: 175px;">Mobile Legends</td>
                            <td>6</td>
                            <td>Firstname X. Surname<br></td>
                            <td>2/2/2022<br></td>
                        </tr>
                        <tr>
                            <td>Los Angeles Lakers</td>
                            <td>Sports<br></td>
                            <td>Basketball</td>
                            <td>15</td>
                            <td>LeBron James<br></td>
                            <td>12/2/2021</td>
                        </tr>
                        <tr>
                            <td>Team Secret</td>
                            <td>eSports<br></td>
                            <td>Valorant</td>
                            <td>6</td>
                            <td>Jessie Vash<br></td>
                            <td>1/15/2020<br></td>
                        </tr>
                        <tr>
                            <td>Nigma</td>
                            <td>eSports<br></td>
                            <td>Dota 2<br></td>
                            <td>6</td>
                            <td>Amer Al-Barkawi<br></td>
                            <td>1/31/2021<br></td>
                        </tr>
                        <tr>
                            <td>Faculty</td>
                            <td>Sports<br></td>
                            <td>Volleyball<br></td>
                            <td>12</td>
                            <td>Heintjie N. Vicente<br></td>
                            <td>6/22/2021</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td><strong>Type</strong></td>
                            <td><strong>Game</strong></td>
                            <td><strong>Members</strong></td>
                            <td><strong>Captain</strong></td>
                            <td><strong>Date Created</strong></td>
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

@endsection
