<?php
/* tests\utilities\functions.php */

use App\Models\Dica;

function createDicas($class, $attributes = [], $times = null)
{
    return Dica::factory()->times($times)->create($attributes);
}

function makeDicas($class, $attributes = [], $times = null)
{
    return Dica::factory()->times($times)->make($attributes);
}

function rawDicas($class, $attributes = [], $times = null)
{
    return Dica::factory()->times($times)->raw($attributes);
}

function limpaPonto(string|null $text){
    if($text == null)
        return null;
    return str_replace('.', '', $text);
}
