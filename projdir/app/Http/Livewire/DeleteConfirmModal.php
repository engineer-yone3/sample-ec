<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteConfirmModal extends Component
{
    public $showModal = false;
    public $user_id;

    public function render()
    {
        return view('livewire.delete-confirm-modal');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
