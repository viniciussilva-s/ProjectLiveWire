<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;

class CategoryForm extends Component
{
    public $name;

    public function save()
    {
        $this->resetErrorBag();
        $rules = [
            'name' => 'required|string|min:3',
        ];

        $validator = Validator::make([
            'name'       => $this->name,
        ], $rules);

        if (Categories::where('name',$this->name)->exists()) {
            $validator->errors()->add('category', 'Esta categoria já cadastrada.');
            $this->setErrorBag($validator->getMessageBag());
            $this->dispatch('validationFailed', $validator->errors()->all());
            return;
        }
        Categories::create(['name' => $this->name]);
        $this->dispatch('categoriaCriada');
        $this->reset('name');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.pages.category-form');
    }
}
