@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="admin admin-events" style="width: 100%">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Местоположение</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Контент</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr class="text-center">
                                <td width="5%">{{ $event->id }}</td>
                                <td width="10%">{{ $event->title }}</td>
                                <td width="10%">{{ $event->location }}</td>
                                <td width="10%">{{ $event->date }}</td>
                                <td width="55%" style="word-wrap:break-word">{!!mb_strimwidth((html_entity_decode($event->content)),0,280,'...')!!}</td>
                                <td width="5%">{{$event->main ? 'Активна' : 'Не активна'}}</td>
                                <td width="5%" class="action">
                                    {{ link_to_action('AdminController@updateEvent', '', ['id' => $event->id], ['class' => 'oi oi-pencil']) }}
                                    {{ link_to_action('AdminController@deleteEvent', '', ['id' => $event->id], ['class' => 'oi oi-delete delete-admin']) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ link_to_action('AdminController@createEvent', 'create',[], ['class' => 'btn btn-secondary']) }}

            </div>
        </div>
    </div>
@endsection