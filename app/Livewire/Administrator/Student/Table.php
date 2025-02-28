<?php

namespace App\Livewire\Administrator\Student;

use App\Models\Classroom;
use App\Models\Grades;
use App\Models\Majors;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
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
        // 'subject',
        // 'classroom',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function mount($classroomId)
    {
        $this->classroomId = $classroomId;
        $this->search;

        // $this->classrooms = Classroom::orderBy('name','asc')->get();
        // $this->subjects = Subject::orderBy('name','asc')->get();
    }

    // public function resetFilter()
    // {
    //     $this->classroom = '';
    //     $this->subject = '';
    //     $this->resetPage();
    // }

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
        ->where('classroom_id', $this->classroomId)
        // ->when($this->subject, function ($query) {
        //     $query->whereHas('subject', function ($q) {
        //         $q->where('name', $this->subject);
        //     });
        // })
        // ->when($this->classroom, function ($query) {
        //     $query->whereHas('classrooms', function ($q) {
        //         $q->where('name', $this->classroom);
        //     });
        // })
        // ->with(['classrooms', 'subject'])
        ->orderBy('name', 'asc')
        ->paginate(8);

        return view('livewire.administrator.student.table',[
            'datas' => $datas,
        ]);
    }
}
