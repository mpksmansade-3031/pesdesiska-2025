<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'nama',
        'foto',
        'visi',
        'misi',
        'type',
    ];
}