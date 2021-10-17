<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model {

    use HasFactory;

    protected $fillable = ['town_id', 'user_id', 'town', 'temperature'];
    
 

    /**
     * Defines the belongs to relationship with Town
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function town() {
        return $this->belongsTo(Town::class, 'town_id');
    }

    /**
     * Defines the belongs to relationship with User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
