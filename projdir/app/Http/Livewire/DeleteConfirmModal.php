<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteConfirmModal extends Component
{
    public bool $showModal = false;
    public string $target_type;
    public int $target_id;
    public string $post_route;

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
