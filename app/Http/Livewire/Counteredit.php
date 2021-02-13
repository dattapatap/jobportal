<?php

namespace App\Http\Livewire;

use App\Models\QuestionOptions;
use App\Models\Questions;
use Livewire\Component;

class Counteredit extends Component
{
    public $opt = [] ;

    public function mount($options)
    {
         $this->opt = $options->toArray();
    }
    public function increment()
    {
         $this->opt[] = count( $this->opt );
    }
    
    public function delete($index)
    {
        $optsss = $this->opt[$index];
        if(isset($optsss['id'])){
            QuestionOptions::find($optsss['id'])->delete();
        }
        unset( $this->opt[$index]);
    }
    public function render()
    {
        return view('livewire.editoptions');
    }

}
