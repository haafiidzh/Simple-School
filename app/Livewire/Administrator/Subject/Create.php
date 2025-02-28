<?php

namespace App\Livewire\Administrator\Subject;

use Livewire\Component;
use App\Models\Subject;

class Create extends Component
{
    public $name;
    public $description;
    
    public function mount()
    {
        // 
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:subjects,name',
            'description' => 'required',
        ];
    }
    
    public function store()
    {
        // Validasi input
        $this->validate();

        Subject::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        
        session()->flash('flash_message', [
            'type' => 'created',
            'message' => 'Berhasil menambah mata pelajaran baru.',
        ]);

        return redirect()->route('administrator.subject');
    }

    public function render()
    {
        return view(
            'livewire.administrator.subject.create',
        );
    }
}