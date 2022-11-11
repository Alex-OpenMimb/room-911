<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class UserController extends Component
{
    public function mount(){

     
        $this->url          =  Route::current()->getName();
     
    }
    public function render()
    {
        return view('livewire.user.component');
    }
}
