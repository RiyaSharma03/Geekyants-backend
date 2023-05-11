<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'title', 'status', 'user_id',  'created_at', 'updated_at'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
