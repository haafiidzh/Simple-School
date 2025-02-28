<?php

namespace App\Livewire\Administrator\Teacher;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $nip;
    public $email;
    public $phone;
    public $address;
    public $religion;
    public $gender;
    public $birth_date;
    public $birth_place;
    public $subject;

    public $subjects;
    public $classrooms;
    public $selectedClassrooms = [];
    
    public function mount()
    {
        $this->subjects = Subject::orderBy('name', 'asc')->get();
        $this->classrooms = Classroom::orderBy('name', 'asc')->get();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'nip' => 'required|unique:teachers,nip',
            'email' => 'required|unique:teachers,email', 
            'phone' => 'required', 
            'address' => 'required', 
            'gender' => 'required', 
            'religion' => 'required', 
            'birth_date' => 'required', 
            'birth_place' => 'required', 
            'subject' => 'required',
            'selectedClassrooms' => 'required|array|min:1', 
        ];
    }

    public function selectClassroom($classroomId)
    {
        if (in_array($classroomId, $this->selectedClassrooms)) {
            $this->selectedClassrooms = array_diff($this->selectedClassrooms, [$classroomId]);
        } else {
            $this->selectedClassrooms[] = $classroomId;
        }
    }
    
    public function store()
    {
        $this->validate();

        $teacher = Teacher::create([
            'name' => $this->name,
            'nip' => $this->nip,
            'email' => $this->email, 
            'phone' => $this->phone, 
            'address' => $this->address, 
            'religion' => $this->religion, 
            'gender' => $this->gender, 
            'birth_date' => $this->birth_date, 
            'birth_place' => $this->birth_place,
            'subject_id' => $this->subject, 
        ]);

        $teacher->classrooms()->sync($this->selectedClassrooms);
        
        session()->flash('flash_message', [
            'type' => 'created',
            'message' => 'Berhasil menambah guru baru.',
        ]);

        return redirect()->route('administrator.teacher');
    }

    public function render()
    {
        return view(
            'livewire.administrator.teacher.create',
        );
    }
}