<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model {

    use HasFactory;

    protected $fillable = ['town_id', 'temperature'];

    public function town() {
        return $this->belongsTo(Town::class, 'town_id');
    }

}
