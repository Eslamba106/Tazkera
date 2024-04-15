<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $fillable = ['name'  , 'slug'];

    public function users(){
        return $this->hasMany(User::class,'group_id','id');
    }
    public function supportTeam(){
        return $this->belongsToMany(
            Support_Team::class,
            'support_team_group' , 
            'group_id',
            'support_team_id',
            'id',
            'id',
        
        );    
    }
}
