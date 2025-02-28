<?php

namespace App\Livewire\Administrator\Dashboard;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;

class Overview extends Component
{
    public $students;
    public $teachers;
    public $classrooms;

    public function mount()
    {
        $this->students = Student::all()->count();
        $this->teachers = Teacher::all()->count();
        $this->classrooms = Classroom::all()->count();
    }

    public function render()
    {
        return view('livewire.administrator.dashboard.overview');
    }
}
