<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(5);

        return view('services.index',compact('services'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        return view('service.edit', compact('service'));
    }

    //aggiorana nel database l'oggetto con la modifica
    public function update(Service $service, Request $request)
    {
        $this->validateService($request);
        $service->update($request->all());

        return redirect($service->path());
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
