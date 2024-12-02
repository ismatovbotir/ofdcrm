<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fiscal;

class FiscalStatus extends Model
{
    use HasFactory;
    protected $fillable=['fiscal_id'];

    public function fiscal(){
        return $this->belongsTo(Fiscal::class);
    }
}
