<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Sidebar extends Component
{
    public $menu;
    public $search;
    public function render()
    {
        $this->setMenu();
        return view('livewire.dashboard.sidebar');
    }
    private function setMenu()
    {
        $this->menu = [
            'MAIN' => [
                [
                    'title' => 'Dashboard',
                    'icon' => 'fas fa-tachometer-alt',
                    'link' => url('/dashboard')
                ],
            ],
            'CONTENT' => [
                [
                    'title' => 'Content',
                    'icon' => 'fas fa-calendar',
                    'link' => '#',
                    'child' => [
                        [
                            'title' => 'Content',
                            'icon' => 'fas fa-file-word',
                            'link' => url('/dashboard/content')
                        ],
                        [
                            'title' => 'Category',
                            'icon' => 'fas fa-file-word',
                            'link' => url('/dashboard/category')
                        ],
                    ]
                ],
            ],
            'USER' => [
                [
                    'title' => 'User Role',
                    'icon' => 'fas fa-user-graduate',
                    'link' => url('/dashboard/user/role'),
                ],
                [
                    'title' => 'User',
                    'icon' => 'fas fa-user',
                    'link' => '#',
                    'child' => [
                        [
                            'title' => 'Add User',
                            'icon' => 'fas fa-plus',
                            'link' => url('/dashboard/user/add')
                        ],
                        [
                            'title' => 'User List',
                            'icon' => 'fas fa-list',
                            'link' => url('/dashboard/user/list')
                        ],
                    ]
                ],
            ],
        ];

        if(!empty($this->search)){
            $tmp_menu = [];
            foreach ($this->menu as $mkey => $menu) {
                foreach ($menu as $key => $value) {
                    if(preg_match('~('.$this->search.')~i', $value['title'], $output)){
                        $tmp_menu[$mkey][] = $value;
                    }
                    if(!empty($value['child']))
                    {
                        foreach ($value['child'] as $ckey => $cvalue) {
                            if(preg_match('~('.$this->search.')~i', $cvalue['title'], $output)){
                                $tmp_menu[$value['title']][] = $cvalue;
                            }  
                        }
                    }
                }
            }
            $this->menu = $tmp_menu;
        }
    }
}
