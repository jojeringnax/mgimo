@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="admin admin-congratulations" style="width:100%">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">date</th>
                        <th scope="col">Content</th>
                        <th scope="col">Main_photo_id</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($congratulations as $element)
                        <tr class="text-center">
                            <td>{{ $element->id }}</td>
                            <td>{{ $element->title }}</td>
                            <td>{{ $element->date }}</td>
                            <td>{{ $element->content }}</td>
                            <td>{{ $element->main_photo_id }}</td>
                            <td class="action">
                                {{ link_to_action('AdminController@updateCongratulation', '', ['id' => $element->id], ['class' => 'oi oi-pencil']) }}
                                {{ link_to_action('AdminController@deleteCongratulation', '', ['id' => $element->id], ['class' => 'oi oi-delete delete-admin']) }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ link_to_action('AdminController@createCongratulation', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>

@endsection