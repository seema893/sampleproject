<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{
      protected $fillable = ['name'];

      public function user()
      {
      	return $thid->belongsTo(User::class);
      }
}
