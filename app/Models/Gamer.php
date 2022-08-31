<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone_number',
        'points', 'level'
    ];

    /**
     * Gamer's Game
     */
    public function game()
    {
        return $this->hasOne(Game::class);
    }
}
