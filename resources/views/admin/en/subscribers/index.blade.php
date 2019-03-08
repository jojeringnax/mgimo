@extends('layouts.admin')
@section('link')
<link rel="stylesheet" href="{{ asset('css/tableexport.min.css') }}" />
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="admin dmin-news" style="width:100%">
                <table id="excel" class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Course</th>
                        <th scope="col">Faculty</th>
                        <th scope="col">Work</th>
                        <th scope="col">Position</th>
                        <th scope="col">Active</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscribers as $subscriber)
                        <tr class="text-center">
                            <td width="5%">{{ $subscriber->id }}</td>
                            <td width="20%">{{$subscriber->created_at}}</td>
                            <td width="10%">{{ $subscriber->name }}</td>
                            <td width="15%">{{ $subscriber->email }}</td>
                            <td width="5%">{{ $subscriber->course }}</td>
                            <td width="20%">{{ $subscriber->faculty }}</td>
                            <td width="20%">{{ $subscriber->work }}</td>
                            <td width="25%">{{ $subscriber->post }}</td>
                            <td width="5%">{{ $subscriber->active ? 'Активен' : 'Неактивен' }}</td>
                            <td width="10%" class="action">
                                {{ link_to_action('en\AdminController@updateSubscriber', '', ['id' => $subscriber->id], ['class' => 'oi oi-pencil']) }}
                                {{ link_to_action('en\AdminController@deleteSubscriber', '', ['id' => $subscriber->id], ['class' => 'oi oi-delete delete-admin']) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.1/xlsx.full.min.js" integrity="sha256-vzSR+lySv0KEag7JZGIt59p04tPZekm9/N/Se/5s08w=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/FileSaver.min.js') }}" ></script>
    <script src="{{ asset('js/tableexport.min.js') }}" ></script>
    <script>
       $('table#excel').tableExport();
    </script>
@endsection