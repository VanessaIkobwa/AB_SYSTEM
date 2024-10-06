<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Units;

class EditUnitForm extends Component
{
    public $unit;
    public $name;


    public function mount($unit_id)
    {
        $this->unit = Units::find($unit_id);
        $this->name = $this->unit->unit_name;

    }
    public function update()
    {
        $this->validate(['name' => 'required']);

        //updateee
        $update = Units::find($this->unit->id);
        $update->update([
            'unit_name' => $this->name
    ]);

    session()->flash('message','. Unit updated successfully');
    //return $this->redirect('/admin/units');
    return redirect('/admin/units');
    
    }

    public function render()
    {
        return view('livewire.edit-unit-form');
    }
}
