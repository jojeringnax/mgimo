@extends('layouts.admin')
@section('link')
    <link rel="stylesheet" href="/public/css/open-iconic-bootstrap.css">
@endsection
@section('content')
    <h1 class="text-center">РАЗДЕЛ: ГАЛЕРЕЯ</h1>
    <div class="container">
        <div class="row">
            <div class="admin dmin-news" style="width:100%">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Название альбома</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($albums as $album)
                        <tr class="text-center">
                            <td width="5%">{{ $album->id }}</td>
                            <td width="10%">
                                @foreach($album->getTags() as $tag)
                                    {{ $tag }}
                                @endforeach
                            </td>
                            <td width="20%">{{ $album->name }}</td>
                            <td width="10%" class="action">
                                {{ link_to_action('en\AdminController@albumFill', '', ['id' => $album->id], ['class' => 'oi oi-pencil']) }}
                                {{ link_to_action('en\AdminController@deleteAlbum', '', ['id' => $album->id], ['class' => 'oi oi-delete delete-admin']) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ link_to_action('en\AdminController@createAlbum', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>

@endsection