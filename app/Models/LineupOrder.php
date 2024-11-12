<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineupOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'player_id',
        'order',
        'post_id',
    ];

    public function player() {
        return $this->belongsTo(Player::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
