<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rolemodel extends Model
{
	protected $table = 'role';
    //fillable fields
    protected $fillable = ['id_role', 'role'];
}