<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fiscal;
use App\Models\Contact;

class Client extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function fiscals(){
        return $this->hasMany(Fiscal::class);
    }
    public function contacts(){
        return $this->hasMany(Contact::class);
    }
}
