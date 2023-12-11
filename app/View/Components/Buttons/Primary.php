<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Primary extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $type,
        public string $btnType,
        public string $redirect = "false",
        public string $href = ''
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.primary');
    }
}
