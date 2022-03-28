@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dica - {{ $dica->nome }}</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Visualizar dica</h6>
                </div>

                <div class="card-body">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        Nome:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $dica->nome }}</div>
                    <hr class="sidebar-divider my-0">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Tipo:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $dica->veiculo->nome }}</div>
                    <hr class="sidebar-divider my-0">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-3">
                        Marca:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $dica->marca }}</div>
                    <hr class="sidebar-divider my-0">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Modelo:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $dica->modelo }}</div>
                    <hr class="sidebar-divider my-0">
                    @if($dica->versao != "")
                        <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                            Versão
                        </div>
                        <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $dica->marca }}</div>
                    @endif
                    <hr class="sidebar-divider my-0">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Dica:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{!!  $dica->descricao  !!}</div>
                </div>

                <!-- Button -->
                <div class="pl-lg-6 mb-4 ml-4">
                    <div class="row ">
                        <div class="col-lg-5">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
