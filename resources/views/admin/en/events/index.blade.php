@extends('layouts.admin')
@section('link')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{asset('css/datatable/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatable/datatables-select.min.css')}}">
@endsection
@section('content')
    <h1 class="text-center">РАЗДЕЛ: МЕРОПРИЯТИЯ</h1>
    <div class="container">
        <div class="row">
            <div class="admin admin-events" style="width: 100%">
                {{ link_to_action('en\AdminController@createEvent', 'create',[], ['class' => 'btn btn-secondary']) }}

                @if($mainFile !== null)
                    <a href="{{ $mainFile->path }}" download>Скачать файл</a>
                @endif
                {{Form::open(array( 'class'=>'border event-form-add-file', 'files' => true))}}
                    {{ Form::file('event-gr', ['class' => '', 'area-describedby' => '', 'id' => 'event-file']) }}
                    {{ Form::submit($mainFile !== null ? 'Изменить' : 'Добавить файл',['class' => 'item-form-event-btn btn btn-raised btn-primary', 'disabled' => 'disabled']) }}
                {{ Form::close() }}
                <table id="dtBasicExample" class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Местоположение</th>
                            <th scope="col">Дата начала</th>
                            <th scope="col">Дата окончания</th>
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
                                <td width="10%">{{ $event->finish_date }}</td>
                                <td width="45%" style="word-wrap:break-word">{!!cut_html($event->content)!!}</td>
                                <td width="5%">{{$event->main ? 'Активна' : 'Не активна'}}</td>
                                <td width="5%" class="action">
                                    {{ link_to_action('en\AdminController@updateEvent', '', ['id' => $event->id], ['class' => 'oi oi-pencil']) }}
                                    {{ link_to_action('en\AdminController@deleteEvent', '', ['id' => $event->id], ['class' => 'oi oi-delete delete-admin']) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/table/datatables.min.js')}}"></script>
    <script src="{{asset('js/table/datatables-select.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#event-file').change(function () {
                $('.item-form-event-btn').prop('disabled', false)
            })
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection