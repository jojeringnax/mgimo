@extends('layouts.admin')
@section('content')
    <h1 class="text-center">РАЗДЕЛ: ПАРТНЕРЫ</h1>
    <div class="container">
        <div class="row">
            <div class="admin admin-smis" style="width:100%">
                <h2>ПАРТНЕРЫ - ОРГАНИЗАЦИИ</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Link</th>
                        <th scope="col">Category</th>
                        <th scope="col">Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($partnersCompany as $element)
                        <tr class="text-center">
                            <td width="5%">{{ $element->id }}</td>
                            <td>{{ $element->name }}</td>
                            <td>{{ $element->link }}</td>
                            <td>@if($element->category == \App\Partner::ORGANIZATORS)
                                    Организаторы
                                @elseif($element->category == \App\Partner::GENERAL_SPONSORS)
                                    Генеральные спонсоры
                                @elseif($element->category == \App\Partner::SPONSORS)
                                    Спонсоры
                                @elseif($element->category == \App\Partner::INFORM_PARTNERS)
                                    Информационные партнеры
                                @endif
                            </td>
                            <td></td>
                            <td width="10%" class="action">
                                {{ link_to_action('AdminController@updatePartner', '', ['id' => $element->id], ['class' => 'oi oi-pencil']) }}
                                {{ link_to_action('AdminController@deletePartner', '', ['id' => $element->id], ['class' => 'oi oi-delete delete-admin']) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <h2>ПАРТНЕРЫ - ЧАСТНЫЕ ЛИЦА</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Link</th>
                        <th scope="col">Position</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($partnersIndividual as $element)
                        <tr class="text-center">
                            <td width="5%">{{ $element->id }}</td>
                            <td>{{ $element->title }}</td>
                            <td>{{ $element->link }}</td>
                            <td>{{ $element->position }}</td>
                            <td width="10%" class="action">
                                {{ link_to_action('AdminController@updatePartner', '', ['id' => $element->id], ['class' => 'oi oi-pencil']) }}
                                {{ link_to_action('AdminController@deletePartner', '', ['id' => $element->id], ['class' => 'oi oi-delete delete-admin']) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ link_to_action('AdminController@createPartner', 'create',[], ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>
@endsection