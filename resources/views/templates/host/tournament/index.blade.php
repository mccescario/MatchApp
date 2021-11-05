@extends('templates.host.main')

@section('tournament')

    <div>
        <h1 style="padding: 20px 0px;">Tournament Registration</h1>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
        <table class="table my-0" id="dataTable">
            <thead>
                <tr>
                    <th style="text-align: center;"><input type="checkbox"></th>
                    <th>Tournament Name</th>
                    <th>Sport / E-Sport</th>
                    <th>Sport Type</th>
                    <th>Bracket Type</th>
                    <th>Starting Date</th>
                    <th>Date Created<br></th>
                    <th><br><br></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                12
                @foreach ($tournaments as $tournament)
                    <tr>

                        <td>{{ ++$i }}</td>
                        <td>{{ $tournament->tournament_name }}</td>
                        <td>{{ $tournament->tournament_sport }}</td>
                        <td>{{ $tournament->tournament_sport_type }}</td>
                        <td>{{ $tournament->tournament_bracket }}</td>
                        <td>{{ $tournament->tournament_date }}</td>
                        <td>{{ $tournament->tournament_fee }}</td>
                        <td>
                            <form action="{{ route('tournament.destroy',$tournament->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('tournament.show',$tournament->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('tournament.edit',$tournament->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                        <td style="text-align: center;"><input type="checkbox"></td>
                        <td>SK Paliga ng Barangay<br></td>
                        <td>Sport</td>
                        <td>Basketball</td>
                        <td>Elimination<br></td>
                        <td>12-08-2021</td>
                        <td>10-01-2021</td>
                        <td>
                            <div class="text-nowrap">
                                <button class="btn btn-primary" type="button" style="margin: 5px;">View</button>
                                <button class="btn btn-primary" type="button" style="margin: 5px;">Edit</button>
                                <button class="btn btn-primary" type="button" style="background: #fc1600b0;margin: 5px;">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td><br></td>
                    <td><strong>Tournament Name</strong></td>
                    <td><strong>Tournament Type</strong></td>
                    <td><strong>Sport Type</strong></td>
                    <td style="text-align: left;"><strong style="text-align: center;">No. of Teams<br></strong></td>
                    <td><strong style="text-align: left;">Date Created<br></strong></td>
                    <td><strong>Starting Date<br></strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection


