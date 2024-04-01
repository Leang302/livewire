<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    public $username = 'testUser';
    
 public function createNewUser(){
    User::create([
        'name'=>'leang',
        'email'=>'leang@gmail.com',
        'password'=>'12345'
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
