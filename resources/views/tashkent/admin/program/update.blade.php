@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="form-tashkent-prog-create d-flex flex-column col-12 justify-content-center align-items-center border">
                {{ Form::model(\App\tashkent\Event::class, ['class' => 'd-flex flex-column col-7']) }}
                <div class="item-form">
                    {{ Form::label('pre_title', 'Заголовок') }}
                    {{ Form::text('pre_title', $event->pre_title,['class' => 'form-control']) }}
                </div>
                <div class="item-form">
                    {{ Form::label('title', 'Эпиграф') }}
                    {{ Form::text('title', $event->title,['class' => 'form-control']) }}
                </div>

                <div class="item-form">
                    {{ Form::label('date', 'Дата') }}
                    {{ Form::date('date',$event->date, ['class' => 'form-control']) }}
                </div>
                <div class="item-form">
                    {{ Form::label('all_day', 'В течение дня') }}
                    {{ Form::checkbox('all_day',$event->all_day) }}
                </div>

                <div class="item-form d-flex justify-content-center">
                    <div class="item-choice col-xl-5">
                        {{ Form::label('time_from', 'От', ['class' => '']) }}
                        {{ Form::time('time_from', $event->time_from,['class' => 'form-control']) }}
                    </div>
                    <div class="item-choice col-xl-5">
                        {{ Form::label('time_to', 'До', ['class' => '']) }}
                        {{ Form::time('time_to', $event->time_to,['class' => 'form-control']) }}
                    </div>

                </div>
                {{ Form::submit('Сохранить',['class' => 'btn btn-primary']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('input[name="all_day"]').change(function() {
                if($(this)[0].checked) {
                    $('input[type="time"]').each(function() {
                        $(this).attr('disabled', 'disabled');
                        $(this).val(null);
                    })
                } else {
                    $('input[type="time"]').attr('disabled', false);
                }
                $(this).val($(this)[0].checked ? 1 : 0);
            });
        });
    </script>
@endsection