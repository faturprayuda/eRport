<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    protected $fillable = [
        'siswa_id',
        'pelajaran_id',
        'nilai'
    ];

    /**
     * Get the user that owns the Raport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    /**
     * Get the user that owns the Raport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Pelajaran()
    {
        return $this->belongsTo(Pelajaran::class);
    }
}
