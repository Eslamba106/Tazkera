<?php

namespace App\View\Components\user;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{

    public $items;
    public $active;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->items = config('user_nav');
        $this->active = Route::currentRouteName() ;    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.sidebar');
    }
}
