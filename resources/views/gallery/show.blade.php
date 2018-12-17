@foreach($album->photos as $photo)
    <img src="{{ $photo->path }}" />
@endforeach