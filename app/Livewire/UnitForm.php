<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Units;


class UnitForm extends Component
{

    public $name = '';

    public function save()
    {
        $this->validate([
            'name' => 'required'

        ]);

        //save to db
        $save = new Units();
        $save->unit_name = $this->name;
        $save->save();

        session()->flash('message','unit created successfully');
        return redirect('/admin/units');

    }
    public function render()
    {
        return view('livewire.unit-form');
    }
}
