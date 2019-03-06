@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="form-tashkent-prog-create d-flex flex-column col-12 justify-content-center align-items-center border">
                {{ Form::open(['class' => 'd-flex flex-column col-7']) }}
                <div class="item-form">
                    {{ Form::label('pre_title', 'Заголовок') }}
                    {{ Form::text('pre_title', '',['class' => 'form-control']) }}
                </div>
                <div class="item-form">
                    {{ Form::label('title', 'Эпиграф') }}
                    {{ Form::text('title', '',['class' => 'form-control']) }}
                </div>

                <div class="item-form ">
                    {{ Form::label('date', 'Дата') }}
                    {{ Form::date('date','', ['class' => 'form-control date']) }}
                </div>
                <div class="item-form date-item-form">
                    {{ Form::label('all_day', 'В течение дня') }}
                    {{ Form::checkbox('all_day') }}
                </div>

                <div class="item-form d-flex justify-content-center">
                    <div class="item-choice col-xl-5">
                        {{ Form::label('time_from', 'От', ['class' => '']) }}
                        {{ Form::time('time_from', null,['class' => 'form-control']) }}
                    </div>
                    <div class="item-choice col-xl-5">
                        {{ Form::label('time_to', 'До', ['class' => '']) }}
                        {{ Form::time('time_to', null,['class' => 'form-control']) }}
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
            $('.date').change(function(e){
                e.preventDefault();
                let date = $('input.date').val();
                $.ajax({
                    url: '{{url('admin/tashkent/en/program/is_exist_all_day/')}}'+'/'+date,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response == 1) {
                            $('#all_day').attr('disabled', true).val(0);
                            $('.date-item-form').css({'display': 'none'});
                        } else {
                            $('#all_day').attr('disabled', false);
                            $('.date-item-form').css({'display': 'block'});
                            $('#all_day').val($('#all_day')[0].checked ? 1 : 0);
                        }
                    },
                    error: function(response) {
                    }
                })
            });
        });
    </script>

@endsection