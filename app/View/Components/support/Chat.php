<?php

namespace App\View\Components\support;

use Closure;
use App\Models\Message;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{

    public $messages;
    public $newCount;
    public $support_team;
    /**
     * Create a new component instance.
     */
    public function __construct($newCount = 0)
    {
        // $this->support_team = Support_Team::where('id' , $support_team);
        $user = Auth::guard('support_team')->user();
        // dd($user);
        $this->messages = Message::where('receiver' , $user->id)->where('receiver_type' , 'support_team')->get(); //$user->unreadNotifications()->take($count)->get();
        $this->newCount = Message::where('receiver' , $user->id)->where('receiver_type' , 'support_team')->count();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.support.chat');
    }
}
