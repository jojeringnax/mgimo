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
                        <th scope="col">Дата</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Ссылка</th>
                        <th scope="col">Активна</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $element)
                        <tr class="text-center">
                            <td>{{ $element->id }}</td>
                            <td>{{$element->updated_at}}</td>
                            <td>{{ $element->title }}</td>
                            <td><a href="{{ $element->link }}" >{{ $element->link }}</a></td>
                            <td>{{$element->moderated ? 'Активна' : 'Не активна'}}</td>
                            <td class="action">
                                {{ link_to_route('updateArticleTashkent', '', ['id' => $element->id], ['class' => 'oi oi-pencil']) }}
                                {{ link_to_action('tashkent\AdminController@deleteArticle', '', ['id' => $element->id], ['class' => 'oi oi-delete delete-admin']) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ link_to_route('createArticleTashkent', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>

@endsection