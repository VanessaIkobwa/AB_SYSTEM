<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Units;

class UnitsComponent extends Component
{
    public function delete($unit_id)
    {
        $unit = Units::find($unit_id);

        $unit->delete();

    session()->flash('message','. Unit deleted successfully');
    return redirect('/admin/units');
    }
    
    public function render()
    {
        return view('livewire.units-component',[
            'units' => Units::all()
        ]);
    }
}
