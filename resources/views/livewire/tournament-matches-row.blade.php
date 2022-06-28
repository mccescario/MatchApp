<tr>
    <td>
        @isset($match->team_1_id)
        <a href="{{ route('host-team.profile', $match->team_1_id) }}">
            {{ $match->team_one_name }}
        </a>
        @endisset
    </td>
    <td>
        <div class="form-group">
            <input @if(isset($match->winning_team) || !$editable) disabled @endif min="0" max="{{ $winning_score }}"
            type="number"
            class="form-control "
            wire:model='score_one'>
        </div>


    </td>
    <td>
        @isset($match->team_2_id)
        <a href="{{ route('host-team.profile', $match->team_2_id) }}">
            {{ $match->team_two_name }}
        </a>
        @endisset
    </td>
    <td>
        <input @if(isset($match->winning_team) || !$editable) disabled @endif min="0" max="{{ $winning_score }}"
        type="number"
        class="form-control"
        wire:model='score_two'>
    </td>
    <td>
        @switch($match->level)
        @case(4)
        Qualifications
        @break
        @case(3)
        Quarter-Finals
        @break
        @case(2)
        Semi-Finals
        @break
        @case(1)
        Finals
        @break
        @endswitch
    </td>
    <td>Match {{ $match->order }}</td>
    <td>
        @isset($winning_team)
        @if ($winning_team == 1)
        {{ $match->team_one_name }}
        @else
        {{ $match->team_two_name }}
        @endif
        @endisset
    </td>
</tr>
