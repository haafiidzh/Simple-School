<?php

namespace App\Livewire\Administrator\Layouts;

use Livewire\Component;

class Sidebar extends Component
{
    public $logo;

    public function mount()
    {
        //
    }

    public function menu()
    {
        return [
            [
                'name' => 'Dashboard',
                'route' => route('administrator.dashboard'),
                'icon' => 'fa-solid fa-house',
                'active' => request()->is('administrator'),
                'permission' => ['view-dashboard'],
                'is_separator' => false,
                'childs' => [],
            ],
            [
                'name' => 'Umum',
                'route' => null,
                'icon' => '',
                'active' => '',
                'is_separator' => true,
                'childs' => [],
            ],
            [
                'name' => 'Siswa',
                'route' => route('administrator.student'),
                'icon' => 'fa-solid fa-graduation-cap',
                'active' => request()->is('administrator/siswa', 'administrator/siswa/*', 'administrator/siswa1', 'administrator/siswa1/*'),
                'is_separator' => false,
                'childs' => [],
            ],
            [
                'name' => 'Guru',
                'route' => route('administrator.teacher'),
                'icon' => 'fa-solid fa-user',
                'active' => request()->is('administrator/guru', 'administrator/guru/*'),
                'is_separator' => false,
                'childs' => [],
            ],
            [
                'name' => 'Kelas',
                'route' => route('administrator.classroom'),
                'icon' => 'fa-solid fa-shapes',
                'active' => request()->is('administrator/kelas', 'administrator/kelas/*'),
                'is_separator' => false,
                'childs' => [],
            ],
            [
                'name' => 'Lainnya',
                'route' => null,
                'icon' => '',
                'active' => '',
                'is_separator' => true,
                'childs' => [],
            ],
            [
                'name' => 'Mata Pelajaran',
                'route' => route('administrator.subject'),
                'icon' => 'fa-solid fa-book',
                'active' => request()->is('administrator/mata-pelajaran', 'administrator/mata-pelajaran/*'),
                'is_separator' => false,
                'childs' => [],
            ],
        ];
    }

    public function render()
    {
        return view(
            'livewire.administrator.layouts.sidebar',
            ['menu' => self::menu()]
        );
    }
}
