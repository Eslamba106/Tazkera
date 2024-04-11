<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Support_Team extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'support_teams';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
    ];
    public function groups(){
        return $this->hasMany(Group::class,'support_id' , 'id');
    }
}
