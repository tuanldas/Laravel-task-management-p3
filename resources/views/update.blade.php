@extends('layout.base')

@section('title')
    Update
@endsection

@section('namePage')
    Update
@endsection

@section('form')
    <form class="contact100-form validate-form" method="post" action="{{ route('updateData', $id) }}">
        @endsection

        @section('value')
            <div class="container-contact100-form-btn">
                <input class="contact100-form-btn" value="Submit" type="submit">
            </div>
@endsection
