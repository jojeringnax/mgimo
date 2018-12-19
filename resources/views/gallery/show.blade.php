@foreach($album->photos as $photo)
    <img src="{{ $photo->path }}" />
@endforeach
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection