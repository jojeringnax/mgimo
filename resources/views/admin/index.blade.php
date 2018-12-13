@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                        <div class="admin-sections d-flex flex-wrap">
                            <div id="news-adm" class="col-3 item-admin-dashboard">
                                <div class="card d-flex justify-content-center align-items-center">
                                    {{ link_to('admin/news', 'НОВОСТИ') }}
                                </div>
                            </div>
                            <div id="smis-adm" class="col-3 item-admin-dashboard">
                                <div class="card d-flex justify-content-center align-items-center">
                                    {{ link_to('admin/smis', 'СМИ О НАС') }}
                                </div>
                            </div>
                            <div id="events-adm" class="col-3 item-admin-dashboard">
                                <div class="card d-flex justify-content-center align-items-center">
                                    {{ link_to('admin/events', 'МЕРОПРИЯТИЯ') }}
                                </div>
                            </div>
                            <div id="congratulations-adm" class="col-3 item-admin-dashboard">
                                 <div class="card d-flex justify-content-center align-items-center">
                                     {{ link_to('admin/congratulations', 'ПОЗДРАВЛЕНИЯ') }}
                                </div>
                            </div>
                            <div id="books-adm" class="col-3 item-admin-dashboard">
                                <div class="card d-flex justify-content-center align-items-center">
                                    {{ link_to('admin/books', 'КНИГИ') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

