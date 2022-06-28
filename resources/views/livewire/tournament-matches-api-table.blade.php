<div class="row">
    <div class="col-lg-12">
        <div class="app-container col-lg-12" style="width: 100%;">
            @if ($matches->count() === 0)
            <h4 class="my-4">No Matches Generated</h4>
            @else
            {!! $bracket !!}
            @endif
        </div>
    </div>
</div>
