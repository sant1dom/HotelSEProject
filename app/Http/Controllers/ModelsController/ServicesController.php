<?php

namespace App\Http\Controllers\ModelsController;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Service::orderBy('name')->simplePaginate(10);
        return view('services.index', compact('services'));
    }

    public function index_users()
    {
        $services = Service::where('availability', '=', '1')
            ->orderBy('name')
            ->simplePaginate(9);
        return view('services.index-users', compact('services'));
    }

    //Mostra un SINGOLO SPECIFICO oggetto
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    //Mostra una vista per creare un nuovo oggetto
    public function create()
    {
        return view('services.create');
    }

    //inserisce l'oggetto nel DB
    public function store(Request $request)
    {
        $this->validateService($request);

        Service::create($request->all());
        return redirect()->route('services.index')
            ->with('success','Service created successfully.');
    }

    //Mostra una vista per modificare un oggetto esistente
    public function edit(Service $service)
    {
        //compact è un modo veloce per scrivere ['article' => $article]
        return view('services.edit', compact('service'));
    }

    //aggiorana nel database l'oggetto con la modifica
    public function update(Service $service, Request $request)
    {
        $this->validateService($request);
        if ($service->availability == 1 && $request->availability == 0){
            //TODO Inviare mail di rimborso se viene disabilitato il servizio
        }
        $service->update($request->all());
        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }

    //elimina l'oggetto dal database
    public function destroy(Service $service)
    {
        if ($service->bookings()->count() == 0){
            $service->delete();
            return redirect()->route('services.index')
                ->with('success','Service deleted successfully');
        }
        else{
            return redirect()->route('services.index')
                ->with('error','Service cannot be deleted, someone used or booked the service');
        }
    }

    protected function validateService(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'price' => 'required|numeric',
        ]);
    }

}