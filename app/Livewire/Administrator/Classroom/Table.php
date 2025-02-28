<?php

namespace App\Livewire\Administrator\Classroom;

use App\Models\Classroom;
use App\Models\Grades;
use App\Models\Majors;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $majors;
    public $grades;
    
    public $search;
    public $grade;
    public $major;

    protected $queryString = [
        'search',
        'grade',
        'major',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->search;

        $this->majors = Majors::all();
        $this->grades = Grades::all();
    }

    public function resetFilter()
    {
        $this->major = '';
        $this->grade = '';
        $this->resetPage();
    }

    public function filter()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $classroom = Classroom::find($id);

        if ($classroom) {
            $tempName = $classroom->name;
            $classroom->delete();
            session()->flash('flash_message', [
                'type' => 'created',
                'message' => 'Berhasil menghapus kelas ' . $tempName . '.',
            ]);
            $this->dispatch('show-flash-message');
            $this->resetPage();
        } else {
            session()->flash('flash_message', [
                'type' => 'deleted',
                'message' => 'Kelas tidak ditemukan.',
            ]);
            $this->dispatch('show-flash-message');
            $this->resetPage();
        }
    }

    public function render()
    {
        $datas = Classroom::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->when($this->grade, function ($query) {
            $query->whereHas('grade', function ($q) {
                $q->where('grade', $this->grade);
            });
        })
        ->when($this->major, function ($query) {
            $query->whereHas('major', function ($q) {
                $q->where('name', $this->major);
            });
        })
        ->with(['major', 'grade'])
        ->orderBy('name', 'asc')
        ->paginate(8);

        return view('livewire.administrator.classroom.table',[
            'datas' => $datas,
        ]);
    }
}
