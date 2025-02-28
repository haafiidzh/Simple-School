<?php

namespace App\Livewire\Administrator\Student;

use App\Models\Student;
use Livewire\Component;


class Edit extends Component
{
    public $data;

    public $name;
    public $nis;
    public $email;
    public $phone;
    public $address;
    public $religion;
    public $gender;
    public $birth_date;
    public $birth_place;

    public function mount($classroomId, $studentId)
    {
        $this->data = $studentId;

        $this->name = $this->data->name;
        $this->nis = $this->data->nis;
        $this->email = $this->data->email;
        $this->phone = $this->data->phone;
        $this->address = $this->data->address;
        $this->religion = $this->data->religion;
        $this->gender = $this->data->gender;
        $this->birth_date = $this->data->birth_date;
        $this->birth_place = $this->data->birth_place;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'nis' => 'required|unique:students,nis,' . $this->data->id,
            'email' => 'required|email|unique:students,email,' . $this->data->id,
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'birth_date' => 'required|date',
            'birth_place' => 'required',
        ];
    }


    public function update()
    {
        $this->validate();

        $this->data->update([
            'name' => $this->name,
            'nis' => $this->nis,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
        ]);

        session()->flash('flash_message', [
            'type' => 'created',
            'message' => 'Berhasil memperbarui informasi kelas.',
        ]);

        // return redirect()->route('administrator.classroom');
        $this->dispatch('back');
    }


    public function render()
    {
        return view(
            'livewire.administrator.student.edit',
        );
    }
}
