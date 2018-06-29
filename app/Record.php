<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function User()
    {
      return $this->belongsTo(User::class);
    }
}