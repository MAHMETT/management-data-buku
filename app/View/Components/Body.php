<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Body extends Component
{
    /**
     * Create a new component instance.
     */

    public $titlePage;
    public $widthCont;
    public function __construct( $titlePage = 'Aplikasi Managemen Data Buku' , $widthCont = 'min-w-[75rem]')
    {
        $this->titlePage = $titlePage;
        $this->widthCont = $widthCont;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.body');
    }
}
