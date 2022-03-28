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
                    <h6 class="m-0 font-weight-bold text-primary">Alterar dica</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('dicas.update', ['dica' => $dica->id]) }}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="usuario_id" value="{{ Auth::guard('usuario')->user()->id }}">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome da dica<span class="small text-danger">*</span></label>
                                        <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome" required value="{{ old('nome', $dica->nome) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="tipo">Tipo<span class="small text-danger">*</span></label>
                                        <select name="veiculo_id" class="form-control" id="tipo" required>
                                            <option value="">Selecione um tipo</option>
                                            @foreach($veiculos as $veiculo)
                                                <option value="{{ $veiculo->id }}" {{ old('veiculo_id', $dica->veiculo_id) == $veiculo->id? 'selected':'' }}>{{ $veiculo->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="marca">Marca<span class="small text-danger">*</span></label>
                                        <input type="text" id="marca" class="form-control" name="marca" placeholder="marca" required value="{{ old('marca', $dica->marca) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="modelo">Modelo<span class="small text-danger">*</span></label>
                                        <input type="text" id="modelo" class="form-control" name="modelo" placeholder="modelo" required value="{{ old('modelo', $dica->modelo) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="versao">Versão</label>
                                        <input type="text" id="versao" class="form-control" name="versao" placeholder="versao" value="{{ old('versao', $dica->versao) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="dica">Dica <span class="small text-danger">*</span></label>
                                        <textarea name="descricao" id="" class="form-control" rows="3" required>{{ old('descricao', $dica->descricao) }}</textarea>
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
