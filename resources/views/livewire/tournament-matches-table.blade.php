<div class="mb-3 row">
    <div class="col-lg-12">
        <div class="card col-lg-12" style="margin-top: 16px;">
            <div class="card-body">
                @if ($matches->count() == 0)
                @if ($can_generate)
                <button wire:click="generate" class="text-white btn btn-info">Generate Matches</button>
                @else
                <p class="text-danger">Not Enough Participants</p>
                @endif
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Team 1</th>
                            <th scope="col">Score</th>
                            <th scope="col">Team 2</th>
                            <th scope="col">Score</th>
                            <th scope="col">Level</th>
                            <th scope="col">Order</th>
                            <th scope="col">Winner</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tournament->matches as $match)
                        <livewire:tournament-matches-row key="{{ now() }}" :tournamentMatch='$match->id'
                            :winning_score="$winning_score" />
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
            <div wire:loading class="loading">Loading&#8230;</div>
        </div>
        <div class="app-container col-lg-12" style="width: 100%;">
            @if ($matches->count() === 0)
            <h4 class="my-4">No Matches Generated</h4>
            @else
            {!! $bracket !!}
            @endif
        </div>
    </div>

</div>
