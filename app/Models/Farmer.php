<?php

// app/Models/Farmer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone_number', 'farm_group_id'
    ];

    public function farmGroup()
    {
        return $this->belongsTo(FarmGroup::class);
    }
}
