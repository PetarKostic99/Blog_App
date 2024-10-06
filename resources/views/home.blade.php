@extends('layouts.blog')
@section('title', 'Najnoviji Blogovi')
@section('main')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center d-flex">

            <div class="col-md-8 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="/post/{{ $post->id }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle">{{ $post->content }}</h3>
                        </a>
                    </div>
                @endforeach
                <hr class="my-4" />


                <!-- Pager-->

            </div>

        </div>
    </div>
    </div>
@endsection
