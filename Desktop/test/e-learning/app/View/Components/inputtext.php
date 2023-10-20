<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inputtext extends Component
{

    public $name;
    public $id;
    public $style;
    public $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$id,$style,$class)
    {
        $this->name = $name;
        $this->id = $id;
        $this->style = $style;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputtext');
    }
}
