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
                            <th scope="col">Tag</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $element)
                        <tr class="text-center">
                            <td>{{ $element->id }}</td>
                            <td>
                                @foreach($element->getTags() as $tag)
                                    {{ $tag }}
                                @endforeach
                            </td>
                            <td>{{ $element->title }}</td>
                            <td>{!!html_entity_decode($element->content)!!}</td>
                            <td class="action">
                                {{ link_to_action('AdminController@updateArticle', '', ['id' => $element->id], ['class' => 'oi oi-pencil']) }}
                                {{ link_to_action('AdminController@deleteArticle', '', ['id' => $element->id], ['class' => 'oi oi-delete delete-admin']) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ link_to_action('AdminController@createArticle', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>

@endsection