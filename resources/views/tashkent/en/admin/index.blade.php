@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard EN Tashkent_2019</div>
                    <div class="card-body">
                        <a href="{{ url('register') }}">Добавить пользователя</a>
                        <div class="admin-sections d-flex flex-wrap">
                            <div id="news-adm" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 item-admin-dashboard">
                                {{ link_to('admin/tashkent/en/news', 'НОВОСТИ', ['class' => 'card d-flex justify-content-center align-items-center']) }}
                            </div>
                            <div id="smis-adm" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 item-admin-dashboard">
                                {{ link_to('admin/tashkent/en/program', 'ПРОГРАММА ФОРУМА', ['class' => 'card d-flex justify-content-center align-items-center text-center']) }}
                            </div>
                        </div>
                    </div>
                </div>
                {{ link_to('admin/', 'Назад', ['class' => 'btn btn-outline-primary']) }}
            </div>
        </div>
    </div>

@endsection

