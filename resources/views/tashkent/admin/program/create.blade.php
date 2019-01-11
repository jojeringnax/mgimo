@extends('layouts.admin')

@section('content')
{{ Form::open() }}

{{ Form::date('date') }}


{{ Form::time('time_from') }}
{{ Form::time('time_to') }}
{{ Form::text('pre_title') }}
{{ Form::text('title') }}
{{ Form::checkbox('all_day') }}
{{ Form::submit() }}

{{ Form::close() }}
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