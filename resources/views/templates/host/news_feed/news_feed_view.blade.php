@extends('templates.host.main')

@section('content')

<div>

    <div>
        <a href="{{ url()->previous() }}" class="btn btn-bg mb-3"> Back</a>
    </div>

    <div>
        <div class="card m-2 ">
            <div class="card-header">
                <h3>View News</h3>
            </div>
            <div class="card-body p-3">
                <div>

                        <div class="row">
                            <label class="col-1-1 form-label fs-4 ms-" for=""><strong>Image: </strong> </label>
                            <img class="img-thumbnail w-25" src="{{asset('/images/'.$news->img_path) }} " alt="" width="200">
                        </div>

                        <div class="row">
                            <label class="col-1 form-label fs-4 ms-" for=""><strong>Title: </strong> </label>
                            <p class="col  rounded  fs-3 m-2 "  type="text" id="" >{{ $news->title }} </p>
                        </div>

                        <div class="row ">
                            <label class="col-1 form-label fs-4 ms-" for=""><strong>Author: </strong> </label>
                            <p class="col  rounded fs-3 m-2 "  type="text"  id="" >{{ $news->user->name }} </p>
                        </div>

                        <div>
                            <label class="col-4 form-label fs-4" for=""><strong>Content: </strong> </label>
                            <textarea class="col border rounded w-100 fs-4 m-2 p-3" readonly id="" cols="30" rows="10" placeholder="{{ $news->description}}"></textarea>
                        </div>


                        <div class="text-center">
                            <a href="{{ url('news-feed/'.$news->slug.'/edit') }}" class="uppercase btn btn-bg shadow" type="submit" >Edit News</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
