<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Departement;
use App\Models\Division;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

//use App\Models\Employee;

class EmployeeController extends Controller
{
   
    // public function divisions()
    // {
    //     return Division::orderBy('div_description','ASC')->get(['id','div_description']);
    // }

    // public function departements(Division $division)
    // {
    //     return $division->departements()->orderBy('dept_description','ASC')->get(['id','dept_description']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with(['division','departement'])->get();
        // $employees = Employee::all();
        
        return view ('admin.employee.index', compact('employees') );
     
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $division = Division::all();
        $departement = Departement::all();
        return view('admin.employee.form', compact('division','departement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee;  
        $employee-> departement_id = $request-> departement_id;
        $employee-> division_id = $request-> division_id;
        $employee-> name = $request-> name;
        $employee-> place_of_birthday = $request-> place_of_birthday;
        $employee-> birthday = $request-> birthday;
        $employee-> sex = $request-> sex;
        $employee-> address = $request-> address;
        $employee-> phone = $request-> phone;
        $employee-> isActive = $request-> IsActive;
        $employee-> note = $request-> note;
        $employee->save();
        
       return redirect('admin/employees')->with('status', 'Employee added!');
    //return $request;
        
    }

    // public function getSubCatAgainstMainCatEdit($id){
    //     echo json_encode(DB::table('departement')->where('departement_id', $id)->get());
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin/employee/show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($emp_id)
    {
    //     if(empty($emp_id)) {
    //         return redirect('admin/employees/create');
    //     }
    //    $employees = DB::table('employees')->where('emp_id', $emp_id)->first();
    //     return view ('admin.employee.edit', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $emp_id)
    {   
        // DB::table('employees')->where('emp_id', $emp_id)
        // ->update([
        //     'name'=> $request->name,
        //     'place_of_birthday' => $request->place_of_birthday,
        //     'birthday' => $request->birthday,
        //     'sex' => $request->sex,
        //     'address' => $request->address,
        //     'phone' => $request->phone,
        //     'isActive' => $request->IsActive,
        //     'note' => $request->note,
        // ]);
        // return redirect('admin/employees')->with('status', 'Employee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($emp_id)
    {
        // DB::table('employees')->where('emp_id',$emp_id)->delete();
        // return redirect('admin/employees')->with('status', 'Employee DELETED!');
    }
    
}
