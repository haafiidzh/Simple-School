<?php

namespace App\Livewire\Administrator\Subject;

use App\Models\Classroom;
use App\Models\Subject;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $data;

    // Variable
    public $name;
    public $description;

    public function mount($id)
    {
        $this->data = Subject::find($id);

        $this->name = $this->data->name;
        $this->description = $this->data->description;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('subjects', 'name')->ignore($this->data->id),
            ],
            'description' => 'required',
        ];
    }

    public function update()
    {
        $this->validate();

        $this->data->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('flash_message', [
            'type' => 'created',
            'message' => 'Berhasil memperbarui informasi mata pelajaran.',
        ]);

        return redirect()->route('administrator.subject');
    }


    public function render()
    {
        return view(
            'livewire.administrator.subject.edit',
        );
    }
}
