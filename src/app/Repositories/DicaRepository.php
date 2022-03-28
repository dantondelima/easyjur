<?php

namespace App\Repositories;

use App\Repositories\Interfaces\DicaRepositoryInterface;
use Illuminate\Support\Collection;

class DicaRepository extends AbstractRepository implements DicaRepositoryInterface
{
    public function allFilter(string|null $search = '', array $searchFields, int|null $tipo = null, int $limit = 6, int|null $usuario = null): mixed
    {
        $results = $this->model::with('veiculo')->orderby('id', 'desc')->where(function ($query) use ($searchFields, $search){
            $query->where($searchFields[0], 'like', '%' . $search . '%');
            if (count($searchFields) > 1 && $search != '') {
                foreach ($searchFields as $field) {
                    $query->orWhere($field, 'like', '%' . $search . '%');
                }
            }
        });

        if($tipo != null){
            $results->where('veiculo_id', '=', $tipo);
        }

        if($usuario != null){
            $results->where('usuario_id', '=', $usuario);
        }

        return $results->paginate($limit)
            ->appends([
                'busca' => $search,
                'tipo' => $tipo,
            ]);
    }
}
