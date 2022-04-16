@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
<<<<<<< HEAD
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

=======
        <h3 class="text-dark mb-0">News Feed</h3>
    </div>
    <ul class="nav justify-content-start">
        <li class="nav-item">
            <a class="nav-link active underline" href="#"><u>Matches</u></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('newsfeed.tournament') }}">Tournaments</a>
        </li>
    </ul>

    <div class="row">
        @foreach ($matches as $match)
        <div class="col-12 mb-4">
            <div class="card mx-auto" style="width: 560px;">
                <div class="card-img-top">
                    {!! $match->stream_link !!}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $match->team_one_name }} VS {{ $match->team_two_name }} - {{
                        $match->tournament->tournament_name }}</h5>
                    <p class="card-text">Match {{ $match->order }}
                        @switch($match->level)
                        @case(4)
                        <span class="text-secondary"> Qualifications </span>
                        @break
                        @case(3)
                        <span class="text-primary">Quarter-Finals</span>
                        @break
                        @case(2)
                        <span class="text-info">Semi-Finals</span>
                        @break
                        @case(1)
                        <span class="text-success">Finals</span>
                        @break
                        @endswitch
                    </p>

                    <p class="card-text">Score: {{ $match->team_1_score }} - {{ $match->team_2_score }}</p>
                    <a href="{{ route('newsfeed.tournament.show', $match->tournament->id) }}"
                        class="btn btn-primary">View {{ $match->tournament->tournament_name }}</a>
                </div>
            </div>
        </div>
        @endforeach

        <div class="mx-auto">
            {{ $matches->links() }}
        </div>
>>>>>>> dev/MC-revisions
    </div>
</div>

@endsection
