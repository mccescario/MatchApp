@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">[Team Name]</h3>
    <div class="row mb-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header py-3" style="height: 64px;"><button class="btn btn-info btn-sm float-end mb-3 add-row" type="button" style="margin: 0px;width: 170px;background: rgb(78,115,223);border-color: rgb(78,115,223);color: var(--bs-gray-300);"><i class="fas fa-user-cog"></i><strong>&nbsp;Manage Team</strong></button><button class="btn btn-info btn-sm float-end mb-3 add-row" type="button" style="margin: 0px;width: 170px;background: rgb(78,115,223);border-color: rgb(78,115,223);color: var(--bs-gray-300);margin-right: 5px;"><i class="fas fa-plus"></i><strong>&nbsp;Add Member</strong></button>
                    <p class="text-primary m-0 fw-bold" style="width: 978px;">Team Members</p>
                </div>
                <div class="card-body" style="margin-top: -15px;">
                    <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 500px;">Name</th>
                                    <th style="width: 170px;">Birth Date</th>
                                    <th style="width: 150px;">Course</th>
                                    <th style="width: 170px;">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 264.828px;"><i class="fas fa-minus-circle" style="color: var(--bs-red);margin-right: 5px;"></i>Marthen Christ C. Escario</td>
                                    <td>1/31/1996</td>
                                    <td>BSITWMA</td>
                                    <td>Shooting Guard</td>
                                </tr>
                                <tr>
                                    <td>Mark Joseph A. Granada</td>
                                    <td>4/17/1999<br></td>
                                    <td>BSITAGD</td>
                                    <td>Point Guard</td>
                                </tr>
                                <tr>
                                    <td>Angelo U. Payod</td>
                                    <td>11/4/2000<br></td>
                                    <td>BSITWMA<br></td>
                                    <td>Small Forward</td>
                                </tr>
                                <tr>
                                    <td>Jhervie T. Tumaliuan</td>
                                    <td>1/23/2000<br></td>
                                    <td>BSITWMA</td>
                                    <td>Center</td>
                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td>Mark Joseph Granada (Smurf)</td>
                                    <td>4/17/1999<br></td>
                                    <td>BSITAGD<br></td>
                                    <td>Power Forward</td>
                                </tr>
                                <tr></tr>
                            </tbody>
                            <tfoot>
                                <tr></tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite" style="margin-bottom: 0px;color: rgb(78,115,223);">Team Representative: Marthen Christ C. Escario</p>
                            <p id="dataTable_info-2" class="dataTables_info" role="status" aria-live="polite" style="margin-bottom: 0px;color: rgb(78,115,223);">Game Category: Sports</p>
                            <p id="dataTable_info-1" class="dataTables_info" role="status" aria-live="polite" style="color: rgb(78,115,223);">Game Type: Basketball</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
