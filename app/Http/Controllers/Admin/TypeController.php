<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateType;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{

    protected $repository;

    public function __construct(Type $type)
    {
        $this->repository = $type;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->repository->orderBy('name')->paginate(10);

        return view('admin.pages.types.index', [
            'types' => $types,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateType $request)
    {
       
        if(!$this->repository->create($request->all())){
            return redirect()
                    ->back()
                    ->with('error', 'Não foi possivel cadastrar');
        }

        return redirect()->route('types.index')
                            ->with('accept', 'Tipo cadastrado com sucesso!');
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
        if(!$type = $this->repository->where('id', $id)->first()){
            return redirect()->back()   
                            ->with('error', 'Tipo não localizado');
        }

        // dd($type);

        return view('admin.pages.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateType $request, $id)
    {
        if(!$type = $this->repository->where('id', $id)->first()){
            return redirect()->back()   
                            ->with('error', 'Tipo não localizado');
        }

        $type->update($request->all());

        return redirect()->route('types.index')
                        ->with('accept', 'Tipo alterado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        if(!$type = $this->repository->where('id', $id)->first()){
            return redirect()->back()   
                            ->with('error', 'Tipo não localizado');
        }

        // dd($type);

        $type->delete();

        return redirect()->route('types.index')
                        ->with('accept', 'Tipo removido');

    }

    public function search(Request $request)
    {
        $filter = $request->all();
        $types = $this->repository->search($request->filter);

        return view('admin.pages.types.index', compact('filter', 'types'));
    

    }



}
