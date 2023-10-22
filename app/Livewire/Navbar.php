<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public $navActive = false;
    public function render()
    {
        return view('livewire.navbar');
    }

    #[On('nav-clicked')]
    public function updateNav()
    {
        $this->navActive = !$this->navActive;
    }
}
