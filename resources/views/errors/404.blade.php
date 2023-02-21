@extends('layout.site', ['title' => 'Страница не найдена'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class=" mt-4 mb-4">
                <div class="">
                    <h1>Page not found</h1>
                </div>
                <div class="">
                    <img src="{{ asset('images/404.png') }}" alt="" class="img-fluid">
                </div>
                <div class="">
                    <p>Page not found</p>
                </div>
            </div>
        </div>
    </div>
@endsection
