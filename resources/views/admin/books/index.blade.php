@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="admin admin-books" style="width:100%">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th  class="text-center" scope="col">id</th>
                            <th  class="text-center" scope="col">Title</th>
                            <th  class="text-center" scope="col">Description</th>
                            <th  class="text-center" scope="col">Cover_photo_id</th>
                            <th class="text-center" >Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($books as $element)
                        <tr>
                            <td class="text-center">{{ $element->id }}</td>
                            <td class="text-center">{{ $element->title }}</td>
                            <td class="text-center">{!! html_entity_decode($element->description) !!}</td>
                            <td class="text-center">{{ $element->cover_photo_id }}</td>
                            <td class="text-center action">
                                {{ link_to_action('AdminController@updateBook', '', ['id' => $element->id], ['class' => 'oi oi-pencil']) }}
                                {{ link_to_action('AdminController@deleteBook', '', ['id' => $element->id], ['class' => 'oi oi-delete delete-admin']) }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ link_to_action('AdminController@createBook', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>
@endsection

