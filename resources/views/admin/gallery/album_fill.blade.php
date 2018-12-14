{{ Form::model($album, ['class'=>'album-form', 'files' => true]) }}

{{ Form::file('photos[]', ['class' => 'input-default-js', 'area-describedby' => 'photo_area', 'id' => 'photo', 'multiple' => 'multiple']) }}

{{ Form::submit('ga') }}

{{ Form::close() }}
