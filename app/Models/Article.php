<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = ['title', 'description', 'price', 'category_id', 'user_id'];

    protected function casts(): array
    {
        return ['is_accepted' => 'boolean'];
    }

    public function setAccepted(bool $value): void
    {
        $this->is_accepted = $value;
    }

    public static function toBeRevisedCount(): int
    {
        return self::whereNull('is_accepted')->count();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
