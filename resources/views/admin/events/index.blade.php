@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="admin admin-events" style="width: 100%">
                <table class="table table-striped table-bordered">
                    <thead class="">
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">tag</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date</th>
                            <th scope="col">Content</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr class="text-center">
                                <td width="5%">{{ $event->id }}</td>
                                <td class="tag">
                                    @foreach($event->getTags() as $tag)
                                        {{ $tag }}
                                    @endforeach
                                </td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->content }}</td>
                                <td width="10%" class="action">
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