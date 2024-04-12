<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $fillable = ['path' , 'tazkra_slug' ];
    protected $table = 'attachments';

    public function tazkra(){
        return $this->belongsTo(Tazkra::class,'tazkra_slug' , 'id');
    }
}
