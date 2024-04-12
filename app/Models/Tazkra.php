<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tazkra extends Model
{
    use HasFactory;

    protected $fillable = ['subject' ,'message' , 'status' , 'important_degree' , 'type' , 'slug'];

    protected $table = 'tazkras';

    public function attachments(){
        return $this->hasMany(Attachment::class , 'id' , 'tazkra_id');
    }
}
