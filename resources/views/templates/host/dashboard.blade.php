@extends('templates.host.main')

@section('content')

    <div>
        <h1 class="" style="padding: 20px 0px;">Dashboard</h1>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col ">
            <div class="card shadow">
                <div class="card-header">
                    <h3>News Feed</h3>
                </div>

                <div class="card-body p-5">
                    @if (count($news_feed)>0)

                    @foreach ($news_feed as $news)
                        <div class="card shadow my-3">
                            <div class="card-header">
                                <h4 class="font-extrabold">
                                    {{ $news->title }}
                                </h4>

                            </div>

                            <div class="row card-body">
                                <div class="col-4 text-center">
                                    <img src="./images/{{ $news->img_path }}" alt="" width="200" >
                                </div>

                                <div class="m-auto sm:m-auto text-left col">
                                    <div class="">
                                        <p class="text fs-6  pb-9 ">
                                            {{ Illuminate\Support\Str::limit($news->description, 100) }}
                                        </p>
                                    </div>


                                    <p class="px-3 text fw-light ">
                                        by <span class="fst-italic fw-bold ">{{ $news->user->name }}</span>
                                        , Created on {{ date('jS M Y ', strtotime($news->created_at))}}
                                    </p>



                                    <a href="{{ route('news-readmore', $news->slug ) }}" class="shadow border border-secondary uppercase text-muted text-decoration-none float-end btn btn-light">
                                        Read more..
                                    </a>


                                </div>
                            </div>


                        </div>
                    @endforeach
                    @else
                    <h3>No News Available!</h3>
                    @endif
                </div>
            </div>

        </div>

        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Calendar</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>







@endsection


