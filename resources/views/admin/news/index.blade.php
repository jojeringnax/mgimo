@extends('layouts.admin')
@section('link')
    <link rel="stylesheet" href="/public/css/open-iconic-bootstrap.css">
@endsection
@section('content')
    <h1 class="text-center">РАЗДЕЛ: НОВОСТИ</h1>
    <div class="container">
        <div class="row">
            <div class="admin dmin-news" style="width:100%">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">id</th>
                            <th scope="col">Рубрика</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Текст новости</th>
                            <th scope="col">Активна</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $element)
                        <tr class="text-center">
                            <td width="5%">{{ $element->id }}</td>
                            <td width="10%">
                                {{ $element->getTag() }}
                            </td>
                            <td>{{$element->created_at}}</td>
                            <td width="20%">{{ $element->title }}</td>
                            <td width="55%">{!!cut_html($element->content)!!}</td>
                            <td width="55%">{{$element->moderated ? 'Активна' : 'Не активна'}}</td>
                            <td width="10%" class="action">
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