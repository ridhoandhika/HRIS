<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    public function departement()
    {
        return $this->belongsTo('App\Models\Departement');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }

    public static function boot()
    {
        
        parent::boot();
        self::creating(function(Employee $employee) { 
            $employeeCount = Employee::where('emp_id', 'LIKE', '%-'. date('Y'))->count();
            $employeeCount++;
            $employee-> emp_id = 'EMP-'. str_pad($employeeCount, 5, '0', STR_PAD_LEFT) .'-'.date('Y');
            return true;
        });

    }
    //protected $table = 'employees';
   // protected $guarded = [];

/*     protected $fillable = [
'emp_id',
'name',
'place_of_birthday',
'birthday',
'sex',
'address',
'phone',
'isActive',
'note'
    ]; */
}


