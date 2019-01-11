{{ Form::model(\App\tashkent\Event::class) }}

{{ Form::date('date', $event->date) }}


{{ Form::time('time_from', $event->time_from) }}
{{ Form::time('time_to', $event->time_to) }}
{{ Form::text('pre_title', $event->pre_title) }}
{{ Form::text('title', $event->title) }}

{{ Form::checkbox('all_day', $event->all_day) }}
{{ Form::submit() }}

{{ Form::close() }}