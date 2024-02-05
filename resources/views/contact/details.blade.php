@extends('templates.template')

@section('head')
    <title>Contatos - Detalhes</title>
    <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
@endsection

@section('main')
    <h1>Detalhes - Contato</h1>
    <div id="main_form">
        <div class="form-group">
            <span><abbr title="Obrigatório">*</abbr></span>
            <label for="inputName">Nome: </label>
            <input readonly name="name" type="text" class="form-control" id="inputName" placeholder=""
                value="{{ $contact->name }}">
        </div>
        <div class="form-group">
            <span><abbr title="Obrigatório">*</abbr></span>
            <label for="inputContact">Contato: </label>
            <input readonly name="contact" type="tel" class="form-control" id="inputContact" placeholder=""
                value="{{ $contact->contact }}">
        </div>
        <div class="form-group">
            <label for="inputEmail">Email: </label>
            <input readonly name="email" type="text" class="form-control" id="inputEmail" placeholder=""
                value="{{ $contact->email }}">
        </div>
    </div>
@endsection

@section('script')
@endsection
