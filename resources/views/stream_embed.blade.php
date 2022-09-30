@if(isset($current_match->stream_link))
<div class="row">
    <div class="col-7 border-right mx-auto">
        <div class="col-12 mb-2 mt-2">
            <div class="card mx-auto" style="width: 560px;">
                <div class="card-img-top">
                    {!! $current_match->stream_link !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endif