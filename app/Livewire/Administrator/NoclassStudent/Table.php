<?php

namespace App\Livewire\Administrator\NoclassStudent;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $classrooms;
    public $subjects;
    
    public $search;
    public $subject;
    public $classroom;
    
    public $classroomId;

    protected $queryString = [
        'search',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->search;
    }

    public function filter()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $student = Student::find($id);

        if ($student) {
            $tempName = $student->name;
            $student->delete();
            session()->flash('flash_message', [
                'type' => 'created',
                'message' => 'Berhasil menghapus siswa dengan nama ' . $tempName . '.',
            ]);
            $this->dispatch('show-flash-message');
            $this->resetPage();
        } else {
            session()->flash('flash_message', [
                'type' => 'deleted',
                'message' => 'Siswa tidak ditemukan.',
            ]);
            $this->dispatch('show-flash-message');
            $this->resetPage();
        }
    }

    public function render()
    {
        $datas = Student::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->where('classroom_id', null)
        ->orderBy('name', 'asc')
        ->paginate(8);

        return view('livewire.administrator.noclass-student.table',[
            'datas' => $datas,
        ]);
    }
}
