<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;

    //not put something that's s here
    #[Rule('required|min:3|max:10')]
   public $name;
   #[Rule('required|email|unique:users')]
   public $email;
   #[Rule('required|min:3')]
   public $password;

 public function createNewUser(){
    $validated = $this->validate();
    User::create([
        'name'=>$validated['name'],
        'email'=>$validated['email'],
        'password'=>$validated['password']
    ]);
$this->reset(['name','email','password']);
Session::flash('success', 'User created successfully');
Session::flash('timeout', 5);


 }
    public function render()
    {
        $title = 'test';
        $users = User::paginate(5);
        return view('livewire.clicker',[
            'title'=>$title,
            'users'=>$users
        ]);
    }
}
