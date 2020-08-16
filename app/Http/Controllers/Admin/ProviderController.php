<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProviders;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{


    /**
     * Contrutor que leva dados ao Model.
     * @return \App\Models\Provider;
     */

    protected $repository;

    public function __construct(Provider $provider)
    {
        $this->repository = $provider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $providers = $this->repository->orderBy('name')->paginate(10);

        return view('admin.pages.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProviders $request)
    {
        if(!$provider = $this->repository->create($request->all())){
            
           return redirect()->route('providers.index')
                        ->with('error', 'Houve um erro ao cadastrar, tente mais tarde');

        }

        return redirect()->route('providers.index')
                    ->with('accept', 'Marca cadastrada com sucesso!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$provider = $this->repository->where('id', $id)->first()){
            return redirect()->back()   
                            ->with('error', 'Tipo não localizado');
        }

        // dd($provider->name);

        return view('admin.pages.providers.edit', [
            'provider' => $provider,
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProviders $request, $id)
    {
        $provider = $this->repository->where('id', $id)->first();

        $provider->update($request->all());

        return redirect()->route('providers.index')
                            ->with('accept', 'Marca atualziada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$provider = $this->repository->where('id', $id)->first()){
            return redirect()->back()   
                            ->with('error', 'Tipo não localizado');
        }

        $provider->delete();

        return redirect()->route('providers.index')
                        ->with('accept', 'Marca removida com sucesso');
    }


    public function search(Request $request)
    {
        $filter = $request->all();
        $providers = $this->repository->search($request->filter);

        return view('admin.pages.providers.index', [
            'filter' => $filter,
            'providers' => $providers,
        ]);
    }

}
