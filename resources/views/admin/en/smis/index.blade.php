@extends('layouts.admin')
@section('content')
    <h1 class="text-center">РАЗДЕЛ: СМИ О НАС</h1>
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
                        <th scope="col">Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($smis as $element)
                            <tr class="text-center">
                                <td width="5%">{{ $element->id }}</td>
                                <td>{{ $element->title }}</td>
                                <td>{{ $element->link }}</td>
                                <td>{{ $element->link_view }}</td>
                                <td>{{ $element->date }}</td>
                                <td width="10%" class="action">
                                    {{ link_to_action('en\AdminController@updateSmi', '', ['id' => $element->id], ['class' => 'oi oi-pencil']) }}
                                    {{ link_to_action('en\AdminController@deleteSmi', '', ['id' => $element->id], ['class' => 'oi oi-delete delete-admin']) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ link_to_action('en\AdminController@createSmi', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>
@endsection