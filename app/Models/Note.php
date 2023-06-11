<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $primaryKey = 'notes_id';
    protected $fillable = [
        'title',
        'body'
    ];
    
    protected $table = 'notes';
    public $timestamps = false;
}