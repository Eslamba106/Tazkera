<?php

namespace App\Http\Controllers\User;

use App\Models\Tazkra;
use App\Models\Attachment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TazkraController extends Controller
{
    public function index(){
        $items = Tazkra::paginate();
        return view('user.dashboard' , compact('items'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){

        $request->validate([
            'subject'           => 'required',
            'message'           =>'string|required', 
            // 'images'            => 'file|mimes:png,jpg,pdf,jpeg',
            'important_degree'  => 'required|max:20',
            'status'            => 'required',
            'type'              => 'required',
        ]);
        $slug = Str::slug($request->subject, '-');
        $images = $request->images;
        foreach($images as $image){
            $file_name = $image->getClientOriginalName();
            $attachment = new Attachment();
            $attachment->path = $file_name.$slug;
            $attachment->tazkra_slug = $slug;
            $attachment->save();
            $image->move(public_path('Attachments/') , $file_name);
        };

        Tazkra::create([
            'subject'          => $request->subject ,
            'message'          => $request->message ,
            'status'           => $request->status ,
            'type'             => $request->type ,
            'important_degree' => $request->important_degree ,
            'slug'             => $slug,
        ]);
        return redirect()->route('user.dashboard')->with(['success' => 'تمت الاضافة' ]);
    }

    public function show($id){
        $item = Tazkra::findOrFail($id);
        $attachments = Attachment::where('tazkra_slug' , $item->slug)->get();
        return view('user.show' , compact(['item' , 'attachments']));
    }
}
