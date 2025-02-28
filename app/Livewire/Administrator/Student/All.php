<?php

namespace App\Livewire\Administrator\Student;

use App\Models\Classroom;
use App\Models\Grades;
use App\Models\Majors;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;

    public $grades;
    public $majors;
    
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

        $this->grades = Grades::orderBy('grade','asc')->get();
        $this->majors = Majors::orderBy('name','asc')->get();
    }

    public function resetFilter()
    {
        $this->grade = '';
        $this->resetPage();
    }

    public function filter()
    {
        $this->resetPage();
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

        return view('livewire.administrator.student.all',[
            'datas' => $datas,
        ]);
    }
}
