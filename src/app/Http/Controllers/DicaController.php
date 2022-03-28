<?php

namespace App\Http\Controllers;

use App\Http\Requests\DicaRequest;
use App\Models\Dica;
use App\Services\Interfaces\DicaServiceInterface;
use App\Services\Interfaces\VeiculoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DicaController extends Controller
{

    protected VeiculoServiceInterface $veiculoService;
    protected DicaServiceInterface $dicaService;
    protected array $searchFields = [
        'nome',
        'marca',
        'modelo',
        'versao',
        'descricao'
    ];

    public function __construct(VeiculoServiceInterface $veiculoService, DicaServiceInterface $dicaService)
    {
        $this->veiculoService = $veiculoService;
        $this->dicaService = $dicaService;
    }

    public function home(Request $request)
    {
        $veiculos = $this->veiculoService->all();
        $dicas = $this->dicaService->allFilter($request->busca, $this->searchFields, $request->tipo, 1, null);
        return view('home')->with(['veiculos' => $veiculos, 'dicas' => $dicas, 'request' => $request->all()]);
    }

    public function index(Request $request)
    {
        $veiculos = $this->veiculoService->all();
        $dicas = $this->dicaService->allFilter($request->busca, $this->searchFields, $request->tipo, 1, Auth::guard('usuario')->user()->id);
        return view('minhas-dicas')->with(['veiculos' => $veiculos, 'dicas' => $dicas, 'request' => $request->all()]);
    }

    public function create()
    {
        $veiculos = $this->veiculoService->all();
        return view('dica-create')->with(['veiculos' => $veiculos]);
    }

    public function store(DicaRequest $request)
    {
        $this->dicaService->create($request->all());

        return back()->with('success', 'Dica cadastrada com sucesso');
    }

    public function show(Dica $dica)
    {
        return view('dica-show')->with('dica', $dica);
    }

    public function edit(Dica $dica)
    {
        $veiculos = $this->veiculoService->all();
        return view('dica-edit')->with(['veiculos' => $veiculos, 'dica' => $dica]);
    }

    public function update(DicaRequest $request, Dica $dica)
    {
        $result = $this->dicaService->update($dica->id, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }

    public function destroy(Dica $dica)
    {
        $dica->delete();
        return back()->with('success', 'Registro excluído com sucesso');
    }
}
