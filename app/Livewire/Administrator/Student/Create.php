<?php

namespace App\Livewire\Administrator\Student;

use Livewire\Component;
use App\Models\Classroom;
use App\Models\Grades;
use App\Models\Majors;
use App\Models\Student;

class Create extends Component
{
    public $name;
    public $nis;
    public $email;
    public $phone;
    public $address;
    public $religion;
    public $gender;
    public $birth_date;
    public $birth_place;
    public $classroom;

    public $classrooms;

    public function mount()
    {
        $this->classrooms = Classroom::orderBy('name', 'asc')->get();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'nis' => 'required|unique:students,nis',
            'email' => 'required|unique:students,email', 
            'phone' => 'required', 
            'address' => 'required', 
            'gender' => 'required', 
            'religion' => 'required', 
            'birth_date' => 'required', 
            'birth_place' => 'required', 
            'classroom' => 'required', 
        ];
    }
    
    public function store()
    {
        // Validasi input
        $this->validate();

        $kelas = Classroom::find($this->classroom);
        
        Student::create([
            'name' => $this->name,
            'nis' => $this->nis,
            'email' => $this->email, 
            'phone' => $this->phone, 
            'address' => $this->address, 
            'religion' => $this->religion, 
            'gender' => $this->gender, 
            'birth_date' => $this->birth_date, 
            'birth_place' => $this->birth_place, 
            'major_id' => $kelas->major_id, 
            'grade_id' => $kelas->grade_id, 
            'classroom_id' => $this->classroom, 
        ]);
        
        session()->flash('flash_message', [
            'type' => 'created',
            'message' => 'Berhasil menambah siswa baru ke kelas ' . $kelas->name . '.',
        ]);
        return redirect()->route('administrator.student');
        $this->dispatch('show-flash-message');
    }

    public function render()
    {
        return view(
            'livewire.administrator.student.create',
        );
    }
}