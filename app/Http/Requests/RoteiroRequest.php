<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoteiroRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pontos' => ['required', 'json'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
