@extends('layout.base')

@section('title')
    Insert
@endsection

@section('namePage')
    Insert
@endsection

@section('form')
    <form class="contact100-form validate-form" method="post" action="{{ route('edit') }}">
        @endsection

        @section('value')
            <div class="container-contact100-form-btn">
                <input class="contact100-form-btn" value="update" type="submit">
            </div>
        @endsection

        @section('namePage')
            Update
@endsection