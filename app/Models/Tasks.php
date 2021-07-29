<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'start_date', 'end_date', 'completed', 'user_id', 'owner_id'];

    public function owner() {
		return $this->hasOne('App\Models\User', 'id', 'owner_id');
	}

    public function user() {
		return $this->hasOne('App\Models\User', 'id', 'user_id');
	}
}
