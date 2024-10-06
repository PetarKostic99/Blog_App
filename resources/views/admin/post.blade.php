@extends('layouts.admin')
@section('main')
    <div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Naslov Posta</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Datum kreiranja</th>
                    <th scope="col">Obrisi post</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td> <!-- Prikaz imena autora -->
                        <td>{{ $post->created_at }}</td>


                        <td>
                            <form action="{{ route('post.destroy', $post) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger py-1 m-0 text-white" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
