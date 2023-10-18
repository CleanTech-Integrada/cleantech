<?php

namespace App\Http\Controllers;

use App\Http\Requests\RelatorioRequest;
use App\Models\Relatorio;

class RelatorioController extends Controller
{
    public function index()
    {
        $relatorios = Relatorio::all();
    }

    public static function show()
    {

    }

    public function store(RelatorioRequest $request)
    {
        dd($request->validated());
        $relatorio = Relatorio::create($request->validated());

        return to_route('relatorios.show', $relatorio->id);
    }
}
