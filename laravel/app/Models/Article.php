<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use phpDocumentor\Reflection\Types\Boolean;

class Article extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User','likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): Bool
    {
        return $user
        ? (bool)$this->likes->where('id', $user->id)->count()
        :false;
    }
}
