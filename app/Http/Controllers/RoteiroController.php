<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoteiroRequest;
use App\Models\Roteiro;
use Inertia\Inertia;

class RoteiroController extends Controller
{
    public function index()
    {
        $roteiros = Roteiro::all();
    }

    public static function show(Roteiro $roteiro)
    {
        return Inertia::render('Roteiro/Show', [
            'roteiro' => $roteiro
        ]);
    }

    public function store(RoteiroRequest $request)
    {
        $roteiro = Roteiro::create($request->validated());

        return to_route('roteiros.show', $roteiro->id);
    }
}
