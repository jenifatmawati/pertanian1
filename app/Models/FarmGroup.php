<?php

// app/Models/FarmGroup.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmGroup extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'name',
        'location',
        'contact_person'
    ];

    public function farmers()
    {
        return $this->hasMany(Farmer::class);
    }
}
