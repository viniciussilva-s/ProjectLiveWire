<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;


class CategoryList extends Component
{
    public $name;
    public $categoriaId;
    public $isEditing = false;


    public function render()
    {
        return view('livewire.category-list',[
            'categorias' => Categories::with('tickets')->latest()->get(),
        ]);
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $categoria = Categories::findOrFail($id);
        $this->categoriaId = $categoria->id;
        $this->name = $categoria->name;
    }

    public function save()
    {
        try {

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

        } catch (Exception $e) {
            $this->dispatch('validationFailed', $e->getMessage());
            return;
        }
    }

    public function update()
    {
        try {

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
            Categories::where('id', $this->categoriaId)->update(['name' => $this->name]);

            $this->dispatch('categoriaCriada');
            $this->reset('name');
            $this->dispatch('close-modal');

        } catch (Exception $e) {
            $this->dispatch('validationFailed', $e->getMessage());
            return;
        }
    }
}
