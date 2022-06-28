@extends('templates.host.main')

@section('content')

<div>

    <div>
        <a href="{{ url()->previous() }}" class="btn btn-bg mb-3 shadow"> Back</a>
    </div>

    <div>
        <div class="card shadow m-2 ">
            <div class="card-header">
                <h3>News</h3>
            </div>
            <div class="card-body m-auto">
                <div class="row">

                        <div class="col-3 m-auto">
                            <img class=" row m-auto" src="{{asset('/images/'.$news->img_path) }}" alt="" width="300" >
                        </div>

                        <div class="col">

                            <div class="row">
                                <p class="col  rounded fs-3 m-2 p-2"  type="text" name="title" id="" ><strong>{{ $news->title }} </strong></p>
                            </div>

                            <div class="row">
                                <p class="col  rounded ms-5 "  type="text" name="title" id="" >by <strong class="fst-italic">{{ $news->user->name }}</strong> posted on {{ date('jS M Y ', strtotime($news->created_at))}}</p>
                            </div>

                            <div>
                                <p class="col w-100 fs-5 m-2 p-2" name="description" id="" cols="30" rows="10" placeholder="">{{ $news->description}}</p>
                            </div>

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
