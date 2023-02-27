<?php

namespace App\Models;
use App\Models\images;
use App\Models\listing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_listing extends Model
{
    use HasFactory;

    protected $table = 'user_listing';

    protected $fillable = [
   'user_id',
   'listing_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listing()
    {
        return $this->belongsTo(listing::class);
    }
}
