<?php

namespace App\Livewire\Administrator\Subject;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    
    public $search;

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

    public function resetFilter()
    {
        $this->resetPage();
    }

    public function filter()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $subject = Subject::find($id);

        if ($subject) {
            $tempName = $subject->name;
            $subject->delete();
            session()->flash('flash_message', [
                'type' => 'created',
                'message' => 'Berhasil menghapus mata pelajaran ' . $tempName . '.',
            ]);
            $this->dispatch('show-flash-message');
            $this->resetPage();
        } else {
            session()->flash('flash_message', [
                'type' => 'deleted',
                'message' => 'Mata pelajaran tidak ditemukan.',
            ]);
            $this->dispatch('show-flash-message');
            $this->resetPage();
        }
    }

    public function render()
    {
        $datas = Subject::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->orderBy('name', 'asc')
        ->paginate(8);

        return view('livewire.administrator.subject.table',[
            'datas' => $datas,
        ]);
    }
}
