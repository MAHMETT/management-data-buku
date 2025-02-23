<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BodyAuth extends Component
{
    /**
     * Create a new component instance.
     */
    public $titlePage;
    public function __construct( $titlePage = 'Aplikasi Managemen Data Buku' )
    {
        $this->titlePage = $titlePage;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.body-auth');
    }
}
