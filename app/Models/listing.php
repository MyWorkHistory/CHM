<?php

namespace App\Models;
use App\Models\images;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    use HasFactory;
    

    protected $table = 'listings';
    protected $fillable = [
     'english_skill', // 0 = NONE, 1 = Poor, 2= Intermediate, 3= good, 4= perfect
     'location',  //
     'height', //in  CMs
     'phone',
     'contract_signed',// does the model already have a contract yes / no /other
     'available_start_date',
     'warranty', // 0 is no, 1 is yes. if yes, number by months
     'years_of_experience',
     'gender', //  male / female / other type box
     'price',
     'image',
     'note',
      
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(images::class);
    }
}
