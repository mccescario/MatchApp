@extends('templates.host.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Livestream</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow" style="height: 303px;background: #6441a4;"><img class="rounded-circle mb-3 mt-4" src="assets/img/twitch.png" width="160" height="160">
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button" style="background: #1b1b1b;">Stream Now</button></div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 style="font-family: Nunito, sans-serif;color: rgb(58,59,69);">Comments Section</h3>
                </div>
                <div class="card-body" style="height: 360px;">
                    <ul class="list-group" style="margin-bottom: 85px;">
                        <li class="list-group-item" style="margin-bottom:6px;">
                            <div class="d-flex media">
                                <div></div>
                                <div class="media-body">
                                    <div class="d-flex media" style="overflow:visible;">
                                        <div><img class="me-3" style="width: 25px; height:25px;" src="assets/img/user-photo4.jpg"></div>
                                        <div style="overflow:visible;" class="media-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><a href="#">MJ Ato Granada</a> Lakas talaga ni Jhervie Tumaliuan. <br>
<small class="text-muted">February 28, 2022 @ 10:35am </small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" style="margin-bottom: 6px;">
                            <div class="d-flex media">
                                <div></div>
                                <div class="media-body">
                                    <div class="d-flex media" style="overflow:visible;">
                                        <div><img class="me-3" style="width: 25px; height:25px;" src="assets/img/user-photo4.jpg"></div>
                                        <div style="overflow:visible;" class="media-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><a href="#">Jhervie Tumaliuan:</a> GGWP 4-0 Congrats BSITWMA!!<br>
<small class="text-muted">February 28, 2022 @ 10:36am </small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="form-group mb-3"><label class="form-label">Send Comments</label><input type="text" class="form-control"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow"></div>
                </div>
            </div>
            <div>
                <header>
                    <div class="overlay"><video width="560" height="315" preload="auto" autoplay="" loop="" style="width: 2041px;">
                            <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
                        </video>
                        <div class="video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                            <div class="source" src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4"></div>
                        </div>
                    </div>
                    <div class="container h-100">
                        <div class="d-flex text-center h-100">
                            <div class="my-auto w-100 text-white"></div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                        </div>
                    </div>
                </header>
                <section class="m-5"></section>
            </div>
        </div>
    </div>
</div>

@endsection
