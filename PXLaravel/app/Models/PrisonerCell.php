<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrisonerCell extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public function cell()
    {
        return $this->hasOne(Cell::class,'id');
    }
}
