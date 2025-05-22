<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Schema;
use App\Models\Categories;

class StoreTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'status' => 'required|in:aberto,em progresso,resolvido',
            'category_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Schema::hasTable('categories')) {
                        return $fail('Tabela de categorias não existe.');
                    }

                    if (!Categories::where('id', $value)->exists()) {
                        return $fail('Categoria inválida.');
                    }
                },
            ],
        ];
    }
}

