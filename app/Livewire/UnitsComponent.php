<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Units;

class UnitsComponent extends Component
{
    public function render()
    {
        return view('livewire.units-component',[
            'units' => Units::all()
        ]);
    }
}
