<?php

namespace Admin\View\Components;

use Illuminate\View\Component;

class Back extends Component
{
    public $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url=$url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('organization::components.back');
    }
}
