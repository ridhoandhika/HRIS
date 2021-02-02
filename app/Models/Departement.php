<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = ['dept_description'];
    
    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }
    
    public static function boot()
    {
        parent::boot();
        self::creating(function(Departement $departement) { 
            $departementCount = Departement::where('dept_id', 'LIKE', '%-'. date('Y'))->count();
            $departementCount++;
            $departement->dept_id = 'DEPT-'. str_pad($departementCount, 5, '0', STR_PAD_LEFT) .'-'.date('Y');
            return true;
        });

    }
    
}
