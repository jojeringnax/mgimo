{{ Form::open() }}

{{ Form::date('date') }}


{{ Form::time('time_from') }}
{{ Form::time('time_to') }}
{{ Form::text('pre_title') }}
{{ Form::text('title') }}
{{ Form::submit() }}

{{ Form::close() }}