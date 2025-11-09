<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'active_id',
        'from_address_id',
        'to_address_id',
        'transferred_at',
    ];



    public function active()
    {
        return $this->belongsTo(Active::class, 'active_id');
    }

    public function fromAddress()
    {
        return $this->belongsTo(Address::class, 'from_address_id');
    }

    public function toAddress()
    {
        return $this->belongsTo(Address::class, 'to_address_id');
    }
}
