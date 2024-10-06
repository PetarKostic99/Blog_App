@extends('layouts.blog')
@section('title', 'O Nama')
@section('main')
    <main class="mb-4">
        <div class="container">

            <form action="{{ url('update-post/' . $post->id) }}"enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-8 offset-2">
                        <div class="row">
                            <h2> Promeni Objavu </h2>
                        </div>

                        <input id="user_id" type="user_id" class="form-control" name="user_id" value="{{ old('user_id') }}"
                            autocomplete="user_id" autofocus hidden>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label">Naslov Objave</label>
                            <input id="title" type="title" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ $post->title }}" autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label">Deskripcija</label>
                            <input id="content" type="content" class="form-control @error('content') is-invalid @enderror"
                                name="content" value="{{ $post->content }}" autocomplete="content" autofocus>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="row pt-4">
                            <button class="btn" style="background-color: rgb(0, 0, 0); color:white">Update post</button>
                        </div>
                    </div>
            </form>
        </div>
    </main>
@endsection
