<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|unique:categories,name',
        ], [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.min' => 'O nome da categoria deve ter no mínimo 3 caracteres.',
            'name.unique' => 'Esta categoria já existe.',
        ]);

        $category = Categories::create([
            'name' => $validated['name'],
        ]);

        return response()->json([
            'message' => 'Categoria criada com sucesso.',
            'data' => $category,
        ], 201);
    }
}
