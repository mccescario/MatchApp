@extends('templates.host.main')

@section('content')

<div>

    <div>
        <a href="{{ url()->previous() }}" class="btn btn-bg mb-3"> Back</a>
    </div>

    <div>
        <div class="card m-2 ">
            <div class="card-header">
                <h3>Edit News</h3>
            </div>
            <div class="card-body p-3">
                <div class="row">
                        <div class="row ">
                            <label class="col-1-1 form-label fs-4 ms-" for=""><strong>Old Image preview: </strong> </label>
                            <div class="w-50 ms-5">
                                <img class="img-thumbnail " src="{{asset('/images/'.$news->img_path) }} " alt="" width="200">
                                <label for="">
                                <span><strong> Change a new Image: </strong></span>
                                <input
                                    type="file"
                                    name="img_path"
                                    class="hidden">
                                </label>
                            </div>

                        </div>

                        <div class="row my-3">
                            <label class="col-1 form-label fs-4 ms-" for=""><strong>Title: </strong> </label>

                            <input class="col w-25 rounded form-control fs-4" type="text" name="" id="" placeholder="{{ $news->title }}" >
                        </div>

                        <div class="row my-3">
                            <label class="col-1 form-label fs-4 ms-" for=""><strong>Author: </strong> </label>
                            <input class="col w-25 rounded form-control fs-4" type="text" name="" id="" placeholder="{{ $news->user->name }}">
                        </div>

                        <div>
                            <label class="col-1 form-label fs-4" for=""><strong>Content: </strong> </label>
                            <textarea class="col border rounded w-100 fs-4 m-2 p-3"  id="" cols="30" rows="10" placeholder="">{{ $news->description }}</textarea>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
