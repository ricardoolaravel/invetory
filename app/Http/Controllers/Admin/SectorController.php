<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sector;
use Illuminate\Support\Str;
use App\Http\Requests\StoreUpdateSector;
use App\Models\Employee;
use App\Observers\SectorObserver;

class SectorController extends Controller
{

    private $repository, $employees;

    public function __construct(Sector $sector, Employee $employees)
    {
        $this->repository = $sector;
        $this->employees = $employees;
    }

    public function index()
    {
        $sectors = $this->repository->orderBy('name')->paginate();

        return view('admin.pages.sectors.index', [
            'sectors' => $sectors,
        ]);
    }

    public function create()
    {
        return view('admin.pages.sectors.create');
    }

    public function store(StoreUpdateSector $request)
    {
       
        // dd($request->all());
        $this->repository->create($request->all());
       
        return redirect()->route('sectors.index');
    }

    public function show($id)
    {
        $sector = $this->repository->where('id', $id)->first();

        if(!$sector){
            return redirect()->back();
        }

        return view('admin.pages.sectors.show', [
            'sector' => $sector,
        ]);
    }

    public function destroy($id)
    {
        $sector = $this->repository->where('id', $id)->first();
        $employees = $sector->employees()->get()->count();

        // dd($employees);

        if($employees !== 0){
            return redirect()->back()->with('error', 'Existem funcionários cadastrados no setor.');
        }

        if(!$sector)
            return redirect()->back();
        
        $sector->delete();

        return redirect()->route('sectors.index');

    }

    public function search(Request $request)
    {
        $filters = $request->all();
        $sectors = $this->repository->search($request->filter);

        return view('admin.pages.sectors.index', [
            'sectors' => $sectors,
            'filters' => $filters,
        ]);

    }


    public function edit($id)
    {
        $sector = $this->repository->where('id', $id)->first();
        //  dd($sector);
        if(!$sector)
            return redirect()->back();
        
        return view('admin.pages.sectors.edit', [
            'sector' => $sector,
        ]);

    }


    public function update(StoreUpdateSector $request, $id)
    {
        $sector = $this->repository->where('id', $id)->first();

        if(!$sector)
            return redirect()->back();

       $sector->update($request->all());
       return redirect()->route('sectors.index');
    }



}
