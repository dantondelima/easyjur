@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perfil</h1>

    @include('inc.feedback')
    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">

        <div class="col-lg-8 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Minha conta</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('usuario.update', ['usuario' => $usuario->id]) }}" autocomplete="off">
                        @csrf

                        <input type="hidden" name="_method" value="PUT">

                        <h6 class="heading-small text-muted mb-4">Informações</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Nome<span class="small text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="nome" placeholder="Nome" required value="{{ old('nome', $usuario->nome) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email<span class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="easyjur@easyjur.com" required value="{{ old('email', $usuario->email) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="new_password">Senha (preencha apenas se deseja alterar)</label>
                                        <input type="password" id="new_password" class="form-control" name="password" placeholder="Senha">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="confirm_password">Confirme a senha</label>
                                        <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="Confirme a senha">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-6">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 text-center">
                                    <button type="submit" class="btn btn-primary form-control">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
