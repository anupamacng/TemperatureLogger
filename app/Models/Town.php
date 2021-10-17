<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model {

    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Defines the hasMany to relationship with Temperature
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function temperatures() {
        return $this->hasMany(Temperature::class);
    }

}
