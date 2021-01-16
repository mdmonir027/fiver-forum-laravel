<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyReply extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'reply_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
