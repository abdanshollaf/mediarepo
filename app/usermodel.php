<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usermodel extends Model
{
	protected $table = 'users';
    //fillable fields
    protected $fillable = ['nama', 'username','password','id_role'];
    
    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}