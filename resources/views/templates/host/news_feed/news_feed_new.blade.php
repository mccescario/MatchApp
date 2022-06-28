@extends('templates.host.main')

@section('content')

<div>

    <div>
        <h1 class="" style="padding: 20px 0px;">Create News</h1>
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

    <div>
        <div class="card m-2">
            <div class="card-header">
                <h3>Add News</h3>
            </div>
            <div class="card-body m-auto">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('news-feed')}}" method="post" enctype="multipart/form-data">
                            @csrf
    
                            <input class="row border rounded w-100 fs-2 m-2 p-2" type="text" name="title" id="" placeholder="Title...">
    
                            <textarea class="row border rounded w-100 fs-4 m-2 p-2" name="description" id="" cols="30" rows="10" placeholder="Content..."></textarea>
    
                            <div class="m-2">
                                <label for="">
                                    <span>Select a file</span>
                                    <input
                                        type="file"
                                        name="img_path"
                                        class="hidden">
                                </label>
                            </div>
    
                            <div class="text-center">
                                <button class="uppercase btn btn-bg" type="submit" >Add News</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card m-2">
            <div class="card-header">
                <h4>Saved News - Table</h4>
            </div>

            <div class="card-body table-responsive table ">
                <table class="table-striped">
                    @if (count($news_feed)>0)
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Content</th>
                            <th class="text-center">Author</th>
                            <th class="text-center">Date Created</th>
                            <th class="text-center">Date Updated</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ( $news_feed as $news)

                        <tr>
                            <td class="m-2 p-4 text-start h-50">{{ ++$i ?? '' ?? '' }}</td>
                            <td class="m-2 p-4 text-start h-50">{{ $news->title }}</td>
                            <td class="m-2 p-4 text-start w-50 h-50">{{ $news->description }}</td>
                            <td class="m-2 p-4 text-start h-50">{{ $news->user->name }}</td>
                            <td class="m-2 p-4 text-start h-50">{{ date('jS M Y ', strtotime($news->created_at))}}</td>
                            <td class="m-2 p-4 text-start h-50">{{ $news->updated_at }}</td>
                            <th>
                                <form class="m-auto" action="{{ route('news-feed.destroy', $news->id) }}" method="POST">

                                    @method('DELETE')
                                    @csrf

                                    <a class="btn btn-bg m-2" href="{{ route('news-feed.show', $news->slug) }}">Details</a>

                                    <button type="submit" class="btn btn-bg m-2">Delete</button>
                                </form>
                            </th>
                        </tr>

                    @endforeach
                    </tbody>
                    @else
                    <h3>No Records Available!</h3>
                    <hr>
                    @endif
                </table>



            </div>
        </div>


    </div>


</div>

@endsection
