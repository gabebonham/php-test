<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Wallet extends Model
{
    use HasUuids;
    
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = ['owner', 'value'];
    
    

}