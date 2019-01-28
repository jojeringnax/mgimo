@extends('layouts.admin')
@section('content')
    <h1 class="text-center">РАЗДЕЛ: ПОЗДРАВЛЕНИЯ</h1>
    <div class="container">
        <div class="row">
            <div class="admin admin-congratulations" style="width:100%">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Фото или видео</th>
                        <th scope="col">Приоритет</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($congratulations as $element)
                        <tr class="text-center">
                            <td width="5%">{{ $element->id }}</td>
                            <td>{{ $element->title }}</td>
                            <td>
                                @if(!preg_match('/<iframe*/', $element->content))
                                    {{"Фото"}}
                                @else
                                    {{"Видео"}}
                                @endif
                            </td>
                            <td>{{$element->priority}}</td>
                            <td width="10%" class="action">
                                {{ link_to_action('AdminController@updateCongratulation', '', ['id' => $element->id], ['class' => 'oi oi-pencil']) }}
                                {{ link_to_action('AdminController@deleteCongratulation', '', ['id' => $element->id], ['class' => 'oi oi-delete delete-admin']) }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ link_to_action('AdminController@createCongratulation', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>

@endsection