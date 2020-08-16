<?php

namespace App\Http\Controllers\Admin;
use App\Models\Employee;
use App\Models\Sector;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEmployee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    protected $repository, $sector;

    public function __construct(Employee $employee, Sector $sector)
    {
        $this->repository = $employee;
        $this->sector = $sector;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->repository->with('sector')->paginate(10);

        return view('admin.pages.employees.index', [
            'employees' => $employees,
        ]);
        
    }

    public function search(Request $request)
    {
        $filter = $request->all();

        // dd($filters);

        $employees = $this->repository->search($request->filter);
        return view('admin.pages.employees.index', [
            'filter' => $filter,
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sector = $this->sector->orderBy('name')->get();

        //  dd($sector);

         return view('admin.pages.employees.create', [
             'sectors' => $sector,
         ]);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEmployee $request)
    {
        $employee = $this->repository->create($request->all());

        // $sector = $sector->employees()->create($request->all());
        
        if(!$employee)
            return redirect()->back();
        
        return redirect()->route('employees.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->repository->with('sector')->where('id', $id)->first();
        $sector = $this->sector->orderBy('name')->get();
        
        // dd($sector);

        if(!$employee)
            return redirect()->back();

        return view('admin.pages.employees.edit', [
            'employee' => $employee,
            'sectors' => $sector,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateEmployee $request, $id)
    {
      
        // dd($request->all());
        $employee = $this->repository->where('id', $id)->first();
        
        if(!$employee)
            return redirect()->back();
        $employee->update($request->all());

        return redirect()->route('employees.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = $this->repository->where('id', $id)->first();

        if(!$employee)
            return redirect()->back();
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
