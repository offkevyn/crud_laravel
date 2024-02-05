@extends('templates.template')

@section('head')
    <title>Contato - Cadastro</title>
    <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
@endsection

@section('main')
    <h1>Cadastrar - Contato</h1>
    <div id="main_form">
        <form action="{{ route('contacts-store') }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <span><abbr title="Obrigatório">*</abbr></span>
                <label for="inputName">Nome: </label>
                <input name="name" type="text" class="form-control" id="inputName" placeholder=""
                    value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <span><abbr title="Obrigatório">*</abbr></span>
                <label for="inputContact">Contato: </label>
                <input name="contact" type="tel" class="form-control" id="inputContact" placeholder=""
                    value="{{ old('contact') }}">
            </div>
            <div class="form-group">
                <span><abbr title="Obrigatório">*</abbr></span>
                <label for="inputEmail">Email: </label>
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder=""
                    value="{{ old('email') }}">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection

@section('script')
@endsection
