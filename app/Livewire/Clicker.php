<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Clicker extends Component
{

    //not put something that's s here
    #[Rule('required|min:3|max:10')]
   public $name;
   #[Rule('required|email|unique:users')]
   public $email;
   #[Rule('required|min:3')]
   public $password;

 public function createNewUser(){
    $this->validate();
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
