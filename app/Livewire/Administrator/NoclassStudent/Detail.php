<?php

namespace App\Livewire\Administrator\NoclassStudent;

use App\Models\Student;
use Livewire\Component;

class Detail extends Component
{
    public $data;

    public function mount($id)
    {
        $this->data = Student::find($id);
    }

    public function render()
    {   
        return view('livewire.administrator.noclass-student.detail');
    }
}
