<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AlertMessage extends Component
{

    // ระบุรับ props message
    public $messageNew;
    public string $type;
    /**
     * Create a new component instance.
     */
    public function __construct($messageNew, $type)
    {
        $this->messageNew = $messageNew;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert-message');
    }
}
