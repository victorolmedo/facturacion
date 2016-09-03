<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    protected $table = 'role_user';
    protected $fillable = ['role_id', 'user_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function User(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function Role(){
        return $this->belongsTo('App\Role', 'role_id');
    }
    public function scopeGetRelationships($query){
        return $query->with('Role', 'User');
    }
}
