<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $fillable = ['name' , 'support_team_id'];

    public function users(){
        return $this->hasMany(User::class,'group_id','id');
    }
    public function supportTeam(){
        return $this->belongsTo(Support_Team::class,'support_team_id','id');
    }
}
