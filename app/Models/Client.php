<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fiscal;

class Client extends Model
{
    use HasFactory;
    public function fiscals(){
        return $this->hasMany(Fiscal::class);
    }
}
