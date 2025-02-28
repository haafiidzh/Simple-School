<?php

namespace App\Livewire\Administrator\NoclassStudent;

use App\Models\Classroom;
use App\Models\Student;
use Livewire\Component;


class Edit extends Component
{
    public $data;

    public $classroom;
    public $classrooms;

    public function mount($id)
    {
        $this->data = Student::find($id);

        $this->classrooms = Classroom::orderBy('name','asc')->get();
    }

    public function rules()
    {
        return [
            'classroom' => 'required'
        ];
    }


    public function update()
    {
        $this->validate();

        $this->data->update([
            'classroom_id' => $this->classroom,
        ]);

        session()->flash('flash_message', [
            'type' => 'created',
            'message' => 'Berhasil mengassign kelas pada siswa.',
        ]);

        return redirect()->route('administrator.student.custom');
        // $this->dispatch('back');
    }


    public function render()
    {
        return view(
            'livewire.administrator.noclass-student.edit',
        );
    }
}
