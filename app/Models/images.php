<?php

namespace App\Models;

use App\Models\listing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'listing_id',
        'name',
        'path',
    ];

    public function listing()
    {
        return $this->belongsTo(listing::class);
    }
}
