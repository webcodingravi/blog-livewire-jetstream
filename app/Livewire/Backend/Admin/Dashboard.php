<?php

namespace App\Livewire\Backend\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalUsers = [];
    public $totalCategory = [];
    public $totalPost = [];


    public function mount() {
       $this->totalUsers = User::role(['user', 'author'])->count();
        $this->totalCategory = Category::count();
         $this->totalPost = Post::count();

    }


    public function render()
    {
        return view('backend.admin.dashboard')->layout('layouts.admin')->layoutData(['metaTitle' => 'Dashboard - Admin']);
    }
}
