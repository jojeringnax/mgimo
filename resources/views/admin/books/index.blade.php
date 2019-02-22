@extends('layouts.admin')

@section('content')
    <h1 class="text-center">РАЗДЕЛ: КНИГИ</h1>
    <div class="container">
        <div class="row">
            <div class="admin admin-books" style="width:100%">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th  class="text-center" scope="col">id</th>
                            <th  class="text-center" scope="col">Название</th>
                            <th  class="text-center" scope="col">Описание</th>
                            <th  class="text-center" scope="col">Статус</th>
                            <th class="text-center" >Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($books as $element)
                        <tr>
                            <td width="5%" class="text-center">{{ $element->id }}</td>
                            <td class="text-center">{{ $element->title }}</td>
                            <td class="text-center">{!!cut_html($element->content)!!}</td>
                            <td class="text-center">{{$element->status ? 'Активна' : 'Ожидается'}} </td>
                            <td width="10%" class="text-center action">
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

