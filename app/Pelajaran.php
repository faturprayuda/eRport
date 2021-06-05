<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $fillable = [
        'nama_pelajaran',
        'kkm'
    ];

    /**
     * Get all of the comments for the Pelajaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Raport()
    {
        return $this->hasMany(Raport::class);
    }
}
