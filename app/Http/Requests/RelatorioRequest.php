<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelatorioRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pontos' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
