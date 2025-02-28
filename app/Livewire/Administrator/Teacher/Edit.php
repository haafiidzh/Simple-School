<?php

namespace App\Livewire\Administrator\Teacher;

use App\Models\Classroom;
use App\Models\Grades;
use App\Models\Majors;
use App\Models\Subject;
use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $data;

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

    public function mount($id)
    {
        $this->subjects = Subject::orderBy('name', 'asc')->get();
        $this->classrooms = Classroom::orderBy('name', 'asc')->get();

        $this->data = Teacher::find($id);

        $this->name = $this->data->name;
        $this->nip = $this->data->nip;
        $this->email = $this->data->email;
        $this->phone = $this->data->phone;
        $this->address = $this->data->address;
        $this->religion = $this->data->religion;
        $this->gender = $this->data->gender;
        $this->birth_date = $this->data->birth_date;
        $this->birth_place = $this->data->birth_place;
        $this->subject = $this->data->subject_id;

        $this->selectedClassrooms = $this->data->classrooms->pluck('id')->toArray();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'nip' => 'required|unique:teachers,nip,' . $this->data->id,
            'email' => 'required|unique:teachers,email,' . $this->data->id,
            'phone' => 'required', 
            'address' => 'required', 
            'gender' => 'required', 
            'religion' => 'required', 
            'birth_date' => 'required', 
            'birth_place' => 'required', 
            'subject' => 'required', 
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

    public function update()
    {
        $this->validate();
        
        $this->data->update([
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

        $this->data->classrooms()->sync($this->selectedClassrooms);

        session()->flash('flash_message', [
            'type' => 'created',
            'message' => 'Berhasil memperbarui informasi guru.',
        ]);

        return redirect()->route('administrator.teacher');
    }


    public function render()
    {
        return view(
            'livewire.administrator.teacher.edit',
        );
    }
}
