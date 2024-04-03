<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;

    use WithFileUploads;
    //not put something that's s here
    #[Rule('required|min:3|max:10')]
   public $name;
   #[Rule('required|email|unique:users')]
   public $email;

   #[Rule('required|min:3')]
   public $password;
   #[Rule('nullable|sometimes|image|max:1024')]
   public $profile;

 public function createNewUser(){
   $validated =  $this->validate();
    if($this->profile){
        //the return value of this thing is the file path
        $validated['profile']=$this->profile->store('uploads','public');
    }
    User::create($validated);
$this->reset(['name','email','password','profile']);
session()->flash('message', 'User created successfully.');


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
