<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Bill extends Model
{
    use HasFactory,HasUuids;
    
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'to',
        'from',
        'amount',
        'status',
        'pixKey',
        'exp',
    ];
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from');
    }
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to');
    }
}