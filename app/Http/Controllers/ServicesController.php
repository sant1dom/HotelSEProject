<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Service;
use http\Env\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(5);

        return view('services.index',compact('services'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Mostra un SINGOLO SPECIFICO oggetto
    public function show() //Room $room
    {
        $service = Service::findOrFail(1);

        return view('services.show', ['service' => $service]);
    }

    //Mostra una vista per creare un nuovo oggetto
    public function create()
    {
        return view('services.create');
    }

    //inserisce l'oggetto nel DB
    public function store(Request $request)
    {
        $this->validateService();

        Service::create($request->all());
        return redirect()->route('services.index')
            ->with('success','Service created successfully.');
    }

    //Mostra una vista per modificare un oggetto esistente
    public function edit(Service $service)
    {
        //compact è un modo veloce per scrivere ['article' => $article]
        return view('service.edit', compact('service'));
    }

    //aggiorana nel database l'oggetto con la modifica
    public function update(Service $service, Request $request)
    {
        $this->validateService();
        $service->update($request->all());

        return redirect($service->path());
    }

    //elimina l'oggetto dal database
    public function destroy(Service $service)
    {
    }

    protected function validateService()
    {
        return request()->validate([
            'name' => 'required',
            'price' => 'required',
            'availability' => 'required'
        ]);
    }

}
