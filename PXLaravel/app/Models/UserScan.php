<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserScan extends Model
{
    use SoftDeletes;
    use HasFactory;
    /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
