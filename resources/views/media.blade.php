
{{ Form::open(array('action' => 'PhotoController@show', 'files' => true)) }}

{{ Form::file('photo') }}

{{ Form::submit('Click Me!') }}

{{ Form::close() }}