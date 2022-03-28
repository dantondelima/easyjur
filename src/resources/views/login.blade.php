@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Login</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

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

        <div class="col-lg-6 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Realize o Login</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('logar') }}" autocomplete="off">
                        @csrf

                        <div class="pl-lg-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-11">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email<span class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" required name="email" placeholder="usuario@easyjur.com" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-11">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="new_password">Senha<span class="small text-danger">*</span></label>
                                        <input type="password" id="new_password" class="form-control" required name="password" placeholder="Senha">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-6">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 text-center">
                                    <button type="submit" class="btn btn-primary form-control">Entrar</button>
                                </div>
                                <div class="col-lg-5 text-center">
                                    <a href="{{ route('usuario.create')  }}" class="btn btn-success form-control">Cadastre-se</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
