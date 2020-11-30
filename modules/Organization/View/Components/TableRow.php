<?php

namespace Admin\View\Components;

use Illuminate\View\Component;

class TableRow extends Component
{

    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->user = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('organization::components.tablerow');
        
    }

    // public function user($user)
    // {
    //     $this->user = $user;
    // }
}
