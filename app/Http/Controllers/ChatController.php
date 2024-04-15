<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Events\ChatSent;
use App\Models\Support_Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,support_team');
    }
    public function chatForm(Request $request, $id)
    {
        $name = $this->previous_route();
        // $name = Route::currentRouteName();

        $receiver = $this->checkUser($request, $id);
        if ($name === "user.support.index") {
            $receivertype = "user/chat/" . $receiver->id;
            return view('user.chat', compact(['receiver', 'receivertype']));
        } else {
            $receivertype = "support_team/chat/" . $receiver->id;
            return view('support.chat', compact(['receiver', 'receivertype']));
        }
    }

    public function sendMessage(Request $request, $receiver_id)
    {
        $name = $this->previous_route();
        $user = Auth::user();
        if ($user) {
            $data['sender'] = Auth::user()->id;
            $data['receiver'] = $receiver_id;
            $data['sender_type'] = 'user';
            $data['receiver_type'] = 'support_team';
            $data['message'] = $request->message;
            Message::create($data);
            $receiver = Support_Team::where('id', $receiver_id)->first();
            \broadcast(new ChatSent($receiver, $request->message));
        } else {
            $data['sender'] = Auth::guard('support_team')->user()->id;
            $data['receiver'] = $receiver_id;
            $data['sender_type'] = 'support_team';
            $data['receiver_type'] = 'user';
            $data['message'] = $request->message;
            Message::create($data);
            $receiver = User::where('id', $receiver_id)->first();
            \broadcast(new ChatSent($receiver, $request->message));
        }
    }
    public function checkUser($request, $id)
    {
        $name = $this->previous_route();

        if ($name === "user.support.index") {
            $support_team = Support_Team::findOrFail($id);
            return  $support_team;
        } else {
            return $user = User::findOrFail($id);
        };
    }
    function previous_route()
    {
        $previousRequest = app('request')->create(app('url')->previous());

        try {
            $routeName = app('router')->getRoutes()->match($previousRequest)->getName();
        } catch (NotFoundHttpException $exception) {
            return null;
        }

        return $routeName;
    }
}
