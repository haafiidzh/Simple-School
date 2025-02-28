<?php

namespace App\Livewire\Administrator\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class Detail extends Component
{
    public $data;

    public function mount($id)
    {
        $this->data = Teacher::with('classrooms')->find($id);
    }

    public function render()
    {   
        return view('livewire.administrator.teacher.detail');
    }
}
