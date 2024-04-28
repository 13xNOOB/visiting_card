<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitingCard extends Model
{
    use HasFactory;

    // Specify the table if the name of the model is not the singular of the table
    protected $table = 'visiting_cards';

    // Specify the fields that are assignable
    protected $fillable = [
        'user_id',
        'companyLogo',
        'ownerName',
        'ownerDesignation',
        'ownerContactNumber',
        'location',
        'email',
        'social',
        'qr_code'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
