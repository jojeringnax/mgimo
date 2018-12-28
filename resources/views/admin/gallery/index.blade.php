@extends('layouts.admin')
@section('link')
    <link rel="stylesheet" href="/public/css/open-iconic-bootstrap.css">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="admin dmin-news" style="width:100%">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">id</th>
                        {{--<th scope="col">Tag</th>--}}
                        <th scope="col">Название альбома</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($albums as $album)
                        <tr class="text-center">
                            <td width="5%">{{ $album->id }}</td>
      {{--                      <td width="10%">
                                @foreach($element->getTags() as $tag)
                                    {{ $tag }}
                                @endforeach
                            </td>--}}
                            <td width="20%">{{ $album->name }}</td>
                            <td width="10%" class="action">
                                {{ link_to_action('AdminController@albumFill', '', ['id' => $album->id], ['class' => 'oi oi-pencil']) }}
                                {{--{{ link_to_action('AdminController@deleteArticle', '', ['id' => $album->id], ['class' => 'oi oi-delete delete-admin']) }}--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ link_to_action('AdminController@createAlbum', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>

@endsection