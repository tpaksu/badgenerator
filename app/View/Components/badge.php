<?php

namespace App\View\Components;

use Illuminate\View\Component;

class badge extends Component
{
    public $badge;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($badge)
    {
        $this->badge = $badge;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.badge', ["badge" => $this->badge]);
    }
}
