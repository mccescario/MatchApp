@extends('templates.host.main')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
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
        <div class="col-lg-7 col-xl-8">

            <div class="card shadow mb-4">
                <!--Newsfeed header-->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Newsfeed</h6>
                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                            <p class="text-center dropdown-header">News Feed Settings:</p>
                            <a class="dropdown-item" href="#">&nbsp;Add New</a>
                            <a class="dropdown-item" href="#">&nbsp;Edit News</a>
                                <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">&nbsp;Close</a>
                        </div>
                    </div>
                </div>
                <!--Newsfeed body-->
                <div class="card-body">
                    @if (count($news_feed)>0)

                    @foreach ($news_feed as $news)
                    <section class="article-clean">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">

                                    <div class="intro"> <!--news header-->
                                        <h1 class="text-center" style="font-family: Nunito, sans-serif;">{{ $news->title }}</h1>
                                        <p class="text-center">
                                            <span class="by" style="font-family: Nunito, sans-serif;">by</span>
                                            <a href="#" style="font-family: Nunito, sans-serif;">{{ $news->user->name }}</a>
                                            <span class="date" style="font-family: Nunito, sans-serif;">{{ date('jS M Y ', strtotime($news->created_at))}}</span></p>
                                            <img class="img-fluid" src="./images/{{ $news->img_path }}" style="background: url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;);">
                                    </div>

                                    <div class="text"><!--news body-->
                                        <p style="font-family: Nunito, sans-serif;">{{ Illuminate\Support\Str::limit($news->description, 100) }}</p>
                                        <p></p>
                                        <h2><a class="btn btn-primary-outline" href="{{ route('news-readmore', $news->slug ) }}" role="button">Read More &rarr;</a></h2>
                                        <figure class="figure d-block"></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endforeach
                    @else
                        <h3>No News Available!</h3>
                    @endif
                </div>

            </div>
        </div>
        <div class="col-lg-5 col-xl-4">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Calendar</h6>
                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a>
                            <a class="dropdown-item" href="#">&nbsp;Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">&nbsp;Something else here</a>
                        </div>
                    </div>
                </div>
                    <!--Insert calendar-->
            </div>
        </div>
    </div>
</div>

<!--
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

-->





@endsection


