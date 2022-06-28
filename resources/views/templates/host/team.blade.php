@extends('templates.host.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Teams</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-purple m-0 fw-bold">View Teams</p>
        </div>
        <div class="card-body">
            <div class="row">

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

        </div>
    </div>
</div>

@endsection
