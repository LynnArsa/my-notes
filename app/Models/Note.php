<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Note extends Model
{
    use HasFactory;

    protected $primaryKey = 'notes_id';
    protected $fillable = [
        'title',
        'body',
        'updated_at'
    ];
    
    protected $table = 'notes';
    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
