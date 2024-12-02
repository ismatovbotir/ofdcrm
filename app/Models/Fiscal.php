<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FiscalStatus;
use App\Models\Client;

class Fiscal extends Model
{
    use HasFactory;
    protected $fillable=['fm'];
    public function status(){
        return $this->hasMany(FiscalStatus::class);
    }   
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
