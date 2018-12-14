{{ !isset($album) ? Form::open(array('action' => 'AdminController@createAlbum', 'class'=>'album-form')) : Form::model($album, ['class'=>'album-form']) }}
{{ Form::text('name','') }}


{{ Form::submit('ga') }}
{{ Form::close() }}