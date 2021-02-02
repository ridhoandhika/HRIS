<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    // protected $table = 'divisions';
    protected $fillable = ['div_description'];
    public static function boot()
    {
     
        parent::boot();
        self::creating(function(Division $division) { 
            $divisionCount = Division::where('div_id', 'LIKE', '%-'. date('Y'))->count();
            $divisionCount++;
            $division-> div_id = 'DIV-'. str_pad($divisionCount, 5, '0', STR_PAD_LEFT) .'-'.date('Y');
            return true;
        });

    }
    public function departements()
    {
        return $this->hasMany('App\Models\Departement');
    }
    
}
