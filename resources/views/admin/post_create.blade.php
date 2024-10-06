@extends('layouts.admin')
@section('main')
    <div class="container">

        <form action="{{ route('admin.post.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="row">

                <div class="col-8 offset-2">
                    <div class="row">
                        <h2> Dodaj Objavu </h2>
                    </div>

                    <input id="user_id" type="user_id" class="form-control" name="user_id" value="{{ old('user_id') }}"
                        autocomplete="user_id" autofocus hidden>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Naslov Objave</label>
                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>



                    <div class="form-group row">
                        <label for="content" class="col-md-4 col-form-label">Deskripcija</label>


                        <input id="content" type="content" class="form-control @error('content') is-invalid @enderror"
                            name="content" value="{{ old('content') }}" autocomplete="content" autofocus>

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>


                    <div class="row pt-4">
                        <button class="btn" style="background-color: rgb(36, 127, 121); color:white">Dodaj novi
                            post</button>
                    </div>
                </div>
        </form>
    </div>
@endsection
