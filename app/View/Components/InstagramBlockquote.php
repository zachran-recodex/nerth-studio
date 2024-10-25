<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InstagramBlockquote extends Component
{
    public $permalink;

    /**
     * Create a new component instance.
     *
     * @param string $permalink
     * @return void
     */
    public function __construct($permalink)
    {
        $this->permalink = $permalink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.instagram-blockquote');
    }
}
