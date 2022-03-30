<?php

namespace Tests;

use App\Http\Requests\DicaRequest;
use App\Models\Usuario;
use App\Models\Veiculo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected $base_route = null;
    protected $base_model = null;
    protected $base_create = null;
    protected $base_raw = null;
    protected $base_make = null;

    protected function setBaseRoute($route)
    {
        $this->base_route = $route;
    }

    protected function setBaseModel($model)
    {
        $this->base_model = $model;
    }

    protected function setBaseFunctions($route)
    {
        $this->base_create = 'create'.$route;
        $this->base_raw = 'raw'.$route;
        $this->base_make = 'make'.$route;
    }

    protected function signIn($user = null)
    {
        $user = $user ?? Usuario::factory()->create();
        $this->actingAs($user, 'usuario');
        return $this;
    }

    protected function create($attributes = [], $model = '', $route = '')
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.store" : $route;
        $model = $this->base_model ?? $model;

        $function = $this->base_raw;
        $attributes = $function($model, $attributes, 1);

        if (! Auth::guard('usuario')->user()) {
            return $this->post(route($route), $attributes[0])
            ->assertRedirect('login');
        }

        $response = $this->post(route($route), $attributes[0])->assertRedirect()
        ->assertSessionHas('success');

        $model = new $model;

        $this->assertDatabaseHas($model->getTable(), $attributes[0]);

        return $response;
    }

    protected function update($attributes = [], $model = '', $route = '')
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.update" : $route;
        $model = $this->base_model ?? $model;

        $function = $this->base_create;
        $model =  $function($model, $attributes, 1);
        $attributes_ = $model->toArray()[0];

        if (! Auth::guard('usuario')->user()) {
            return $this->put(route($route, $attributes_["id"]), $attributes)
            ->assertRedirect('login');
        }

        $response = $this->put(route($route, $attributes_["id"]), $attributes_)->assertRedirect()
        ->assertSessionHas('success');

        tap($model->fresh(), function ($model) use ($attributes) {
            collect($attributes)->each(function($value, $key) use ($model) {
                $this->assertEquals($value, $model->toArray()[0][$key]);
            });
        });

        return $response;
    }

    protected function destroy($model = '', $route = '')
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.destroy" : $route;
        $model = $this->base_model ?? $model;

        $function = $this->base_create;
        $attributes =  $function($model, [], 1);
        $attributes = $attributes->toArray()[0];

        if (! Auth::guard('usuario')->user()) {
            return $this->delete(route($route, $attributes['id']))->assertRedirect('login');
        }

        $response = $this->delete(route($route, $attributes['id']));

        $model = new $model;

        $this->assertDatabaseMissing($model->getTable(), $attributes);

        return $response;
    }
}
