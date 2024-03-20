<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use SebastianBergmann\Type\VoidType;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_description',
        'progression',
        'stage',
        'mission_img',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope('user', function (Builder $builder) 
        {
            $builder->where('user_id', Auth::id());
        });
    }

}
