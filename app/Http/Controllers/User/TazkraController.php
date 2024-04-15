<?php

namespace App\Http\Controllers\User;

use App\Models\Group;
use App\Models\Tazkra;
use App\Models\Attachment;
use Illuminate\Support\Str;
use App\Models\Support_Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TazkraController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
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
            // $file = $request->file('image');
            $path = $image->store('uploads', [
                'disk' => 'public',
            ]);
            // $file_name = $image->getClientOriginalName();
            $attachment = new Attachment();
            $attachment->path = $path;
            $attachment->tazkra_slug = $slug;
            $attachment->save();
            // $image->move(public_path('Attachments/') , $file_name.$slug);
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
    public function update(Request $request , $id){

        $request->validate([
            'subject'           => 'required',
            'message'           =>'string|required', 
            // 'images'            => 'file|mimes:png,jpg,pdf,jpeg',
            'important_degree'  => 'required|max:20',
            'status'            => 'required',
            'type'              => 'required',
        ]);
        $tazkra = Tazkra::findorFail($id);

        $old_images = Attachment::where('tazkra_slug' , $tazkra->slug)->get();
        if ($request->hasFile('image')) {
            $file = $request->file('images');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
        }
        $new_image = $request->images;
        $slug = Str::slug($request->subject, '-');

        if ($new_image) {
            foreach($new_image as $image){
                // $file = $request->file('image');
                $path = $image->store('uploads', [
                    'disk' => 'public',
                ]);
                $attachment = new Attachment();
                $attachment->path = $path;
                $attachment->tazkra_slug = $slug;
                $attachment->save();
            };
        }
        if ($old_images && $new_image) {
            foreach($old_images as $old_image){
            Storage::disk('public')->delete($old_image->path);
            $old_image->delete();
            }
        }


        $tazkra->update([
            'subject'          => $request->subject ,
            'message'          => $request->message ,
            'status'           => $request->status ,
            'type'             => $request->type ,
            'important_degree' => $request->important_degree ,
            'slug'             => $slug,
        ]);
        return redirect()->route('user.dashboard')->with(['success' => 'تم التعديل' ]);
    }

    public function show($id){
        $item = Tazkra::findOrFail($id);
        $attachments = Attachment::where('tazkra_slug' , $item->slug)->get();
        return view('user.show' , compact(['item' , 'attachments']));
    }
    public function edit($id)
    {
        $item = Tazkra::findOrFail($id);
        $attachments = Attachment::where('tazkra_slug' , $item->slug)->get();
        return view('user.edit' , compact(['item' , 'attachments']));
    }
    public function delete($id){
        $item = Tazkra::findOrFail($id);
        $attachments = Attachment::where('tazkra_slug' , $item->slug)->get();
        $item->delete();
        foreach($attachments as $attachment){

            $attachment->delete();
            if ($attachment) {
                Storage::disk('public')->delete($attachment->path);
            };
        }
        $items = Tazkra::paginate();
        return view('user.dashboard' , compact('items'));
    }
    public function support(){
        $user = Auth::user();
        $all_members = Support_Team::get();
        $group = Group::where('id' , $user->group_id)->first();
       
        $members= [];
        foreach($group->supportTeam as $member){
            $members[]= Support_Team::where('id' , $member->id)->first();
        }
  

        // dd($members[0]->id );
        return view('user.show_support' , compact('members'));
    }
}
