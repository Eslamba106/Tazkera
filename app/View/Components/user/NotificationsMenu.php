<?php

namespace App\View\Components\user;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class NotificationsMenu extends Component
{
    public $notifications;
    public $newCount;
    public function __construct($count = 10)
    {
        $user = Auth::user();
        $this->notifications = [];
        $this->newCount = 5;
        // $this->notifications = $user->unreadNotifications()->take($count)->get();
        // $this->newCount = $user->unreadNotifications()->count();
        }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.notifications-menu');
    }
}
