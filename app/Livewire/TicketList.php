<?php

namespace App\Livewire;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Categories;
use App\Models\Tickets;
use Exception;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class TicketList extends Component
{
    public $title;
    public $description;
    public $status = 'aberto';
    public $category_id;
    public $created_by;
    public $chamadoId;
    public $isEditing = false;
    public $categorys = [];

    protected $listeners = ['categoriaCriada' => 'carregarCategorias'];

    public function mount()
    {
        $this->carregarCategorias();
    }

    public function carregarCategorias()
    {
        $this->categorys = Categories::all();
    }

    public function render()
    {
        return view('livewire.pages.ticket-list', [
            'chamados' => Tickets::with('category')->latest()->get(),
            // 'categorys' => Categories::all(),
        ]);
    }

    public function save()
    {
        try {
            $this->resetErrorBag();
            $rules = (new StoreTicketRequest())->rules();

            $validator = Validator::make([
                'title'       => $this->title,
                'description' => $this->description,
                'status'      => $this->status,
                'category_id' => $this->category_id,
            ], $rules);

            if ($validator->fails()) {
                $this->setErrorBag($validator->getMessageBag());
                $this->dispatch('validationFailed', $validator->errors()->all());
                return;
            }
            $data = $validator->validated();

            $data['created_by'] = 1;

            Tickets::create($data);

            $this->resetForm();
            $this->dispatch('recarregarDataTable');
        } catch (Exception $e) {
            $this->dispatch('validationFailed', $e->getMessage());
            return;
        }
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $chamado = Tickets::findOrFail($id);
        $this->chamadoId = $chamado->id;
        $this->title = $chamado->title;
        $this->description = $chamado->description;
        $this->status = $chamado->status;
        $this->category_id = $chamado->category_id;
    }

    public function update()
    {
        try {

            $this->resetErrorBag();
            $rules = (new StoreTicketRequest())->rules();
            $validator = Validator::make([
                'title'       => $this->title,
                'description' => $this->description,
                'status'      => $this->status,
                'category_id' => $this->category_id,
            ], $rules);

            if ($validator->fails()) {
                $this->setErrorBag($validator->getMessageBag());
                $this->dispatch('validationFailed', $validator->errors()->all());
                return;
            }

            $data = $validator->validated();

            Tickets::where('id', $this->chamadoId)->update($data);

            $this->resetForm();
            $this->dispatch('recarregarDataTable');
        } catch (Exception $e) {
            $this->dispatch('validationFailed', $e->getMessage());
            return;
        }
    }

    public function delete($id)
    {
        Tickets::destroy($id);
        $this->dispatch('recarregarDataTable');

    }

    public function resetForm()
    {
        $this->reset(['title', 'description', 'status', 'category_id', 'chamadoId', 'isEditing']);
    }
}
