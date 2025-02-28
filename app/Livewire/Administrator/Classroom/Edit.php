<?php

namespace App\Livewire\Administrator\Classroom;

use App\Models\Classroom;
use App\Models\Grades;
use App\Models\Majors;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $data;

    // Variable
    public $major;
    public $grade;
    public $name;

    public $majors;
    public $grades;

    public function mount($id)
    {
        $this->data = Classroom::find($id);

        $this->major = $this->data->major_id;
        $this->grade = $this->data->grade_id;

        $nameParts = explode(' ', $this->data->name);

        $this->name = $nameParts[2] ?? '';

        $this->majors = Majors::all();
        $this->grades = Grades::all();
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('classes', 'name')->ignore($this->data->id),
            ],
            'grade' => 'required',
            'major' => 'required',
        ];
    }

    public function update()
    {
        $this->validate();

        $grade_name = Grades::find($this->grade)->grade;
        $major_name = Majors::find($this->major)->name;

        $final_name = $grade_name . ' ' . $major_name . ' ' . $this->name;

        $exists = Classroom::where('name', $final_name)
            ->where('id', '!=', $this->data->id)
            ->exists();

        if ($exists) {
            $this->addError('name', 'Kelas ' . $final_name . ' sudah ada!');
            return;
        }

        $this->data->update([
            'name' => $final_name,
            'major_id' => $this->major,
            'grade_id' => $this->grade,
        ]);

        session()->flash('flash_message', [
            'type' => 'created',
            'message' => 'Berhasil memperbarui informasi kelas.',
        ]);

        return redirect()->route('administrator.classroom');
    }


    public function render()
    {
        return view(
            'livewire.administrator.classroom.edit',
        );
    }
}
