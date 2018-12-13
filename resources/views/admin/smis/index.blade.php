@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="admin admin-smis" style="width:100%">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Link</th>
                        <th scope="col">Link_View</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center">
                        @foreach($smis as $element)
                            <td>{{ $element->id }}</td>
                            <td>{{ $element->title }}</td>
                            <td>{{ $element->link }}</td>
                            <td>{{ $element->link_view }}</td>
                            <td class="action">
                                {{ link_to_action('AdminController@updateSmi', '', ['id' => $element->id], ['class' => 'oi oi-pencil']) }}
                                {{ link_to_action('AdminController@deleteSmi', '', ['id' => $element->id], ['class' => 'oi oi-delete delete-admin']) }}
                            </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                {{ link_to_action('AdminController@createSmi', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>
@endsection