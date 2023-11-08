<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Counter extends Component
{
    use WithFileUploads;
    public $name,$tipo_iden,$iden,$email,$tel,$direccion,$genero,$password, $loginEmail, $loginPassword;
    public $activeTab = 'signup';
    public function setActiveTab($tab) { $this->activeTab = $tab; }
    public function render()
    {
        return view('livewire.counter');
    }
    public function register(){
        $validar=$this->validate([
                'name'=> 'required',
                'tipo_iden'=> 'required',
                'iden'=> 'required|numeric',
                'email'=> 'required|email|unique:users,email',
                'tel'=> 'required|numeric',
                'direccion'=> 'required',
                'genero'=> 'required',
                'password'=>'required',

        ]);
        $validar['password']=Hash::make($validar['password']);
        $user=User::create($validar);
        $this->activeTab='login';

    }
    public function login(){
        $validar=[
                'email'=> $this->email,
                'password'=>$this->password,

        ];
        if (Auth::attempt($validar)) {
            return redirect()->intended('/vistaformulario');
        }
        else {
            session()->flash('error',' Las creenciales no coinciden');
        }
    }
}
