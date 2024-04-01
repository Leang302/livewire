<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    //not put something that's s here
   public $name;
   public $email;
   public $password;

 public function createNewUser(){
    User::create([
        'name'=>$this->name,
        'email'=>$this->email,
        'password'=>$this->password
    ]);
 }
    public function render()
    {
        $title = 'test';
        $users = User::all();
        return view('livewire.clicker',[
            'title'=>$title,
            'users'=>$users
        ]);
    }
}
