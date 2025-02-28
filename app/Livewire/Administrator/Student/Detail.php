<?php

namespace App\Livewire\Administrator\Student;

use App\Models\Student;
use Livewire\Component;

class Detail extends Component
{
    public $data;

    public function mount($classroomId, $studentId)
    {
        $this->data = $studentId;
    }

    public function render()
    {   
        return view('livewire.administrator.student.detail');
    }
}
