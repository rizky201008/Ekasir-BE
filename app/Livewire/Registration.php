<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Registration extends Component
{
    public $name = "";
    public $email = "";
    public $password = "";

    #[Title('Daftar')]
    public function render()
    {
        return view('livewire.registration');
    }

    public function updateForm($state, $value)
    {
        switch ($state) {
            case 0:
                $this->name = $value;
                break;
            case 1:
                $this->email = $value;
                break;
            case 2:
                $this->password = $value;
                break;
        }
    }
}
