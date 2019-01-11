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
                        <th scope="col">Время</th>
                        <th scope="col">Эпиграф</th>
                        <th scope="col">Заголовок</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $date => $eventModels)
                            <tr><td colspan="5" style="text-align: center">{{ $date }}</td></tr>
                            @foreach($eventModels as $event)
                                <tr>
                                <td>{{ $event->all_day ? "В течение дня" : $event->time_from . '-' . $event->time_to }}</td>
                                <td>{{ $event->pre_title }}</td>
                                <td>{{ $event->title }}</td>
                                <td class="action">
                                    {{ link_to_route('updateEventTashkent', '', ['id' => $event->id], ['class' => 'oi oi-pencil']) }}
                                    {{ link_to_action('tashkent\AdminController@deleteProgram', '', ['id' => $event->id], ['class' => 'oi oi-delete delete-admin']) }}
                                </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                {{ link_to_route('createEventTashkent', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>

@endsection