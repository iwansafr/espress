<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;
    protected $rules = [
        'email' => 'required',
        'password' => 'required',
    ];
    public $alert;
    public function render()
    {
        return view('livewire.auth.login');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->alert = ['alert' => 'success', 'msg' => 'Login Berhasil'];
            return redirect('/dashboard');
        } else {
            $this->alert = ['alert' => 'danger', 'msg' => 'Email dan Sandi tidak dikenali'];
        }
    }
    public function messages()
    {
        return [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ];
    }
}
