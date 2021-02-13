<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $options = [] ;
    
    public function increment()
    {
         $this->options[] = count( $this->options);
    }
    
    public function delete($index)
    {
        unset( $this->options[$index]);
    }

    public function render()
    {
        return view('livewire.options');
    }

}
