<?php

namespace App\Livewire\Administrator\Classroom;

use Livewire\Component;
use App\Models\Classroom;
use App\Models\Grades;
use App\Models\Majors;

class Create extends Component
{
    public $name;
    public $major;
    public $grade;

    public $majors;
    public $grades;
    
    public function mount()
    {
        $this->majors = Majors::all();
        $this->grades = Grades::all();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:classes,name',
            'grade' => 'required',
            'major' => 'required', 
        ];
    }
    
    public function store()
    {
        // Validasi input
        $this->validate();

        $grade_name = Grades::find($this->grade)->grade;
        $major_name = Majors::find($this->major)->name;
        

        $final_name = $grade_name . ' ' . $major_name . ' ' . $this->name;

        $exists = Classroom::where('name', $final_name)->exists();

        if ($exists) {
            $this->addError('name', 'Kelas ' . $final_name . ' sudah ada!');
            return;
        }

        Classroom::create([
            'name' => $final_name,
            'major_id' => $this->major,
            'grade_id' => $this->grade,
        ]);
        
        session()->flash('flash_message', [
            'type' => 'created',
            'message' => 'Berhasil menambah kelas baru.',
        ]);

        return redirect()->route('administrator.classroom');
    }

    public function render()
    {
        return view(
            'livewire.administrator.classroom.create',
        );
    }
}