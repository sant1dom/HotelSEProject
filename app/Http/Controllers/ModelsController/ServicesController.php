<?php

namespace App\Http\Controllers\ModelsController;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ImageService;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Service::orderBy('name')->get();
        return view('services.index', compact('services'));
    }

    public function userIndex()
    {
        $services = Service::WhereNotIn('availability', [0])->get();
        return view('services.userIndex', compact('services'));
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

        $service = Service::create($request->all());

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('storage'), $name);

                $image = new ImageService();
                $image->path = $name;
                $image->service_id = $service->id;
                $image->save();
            }
        } else {
            $image = new ImageService();
            $image->path = 'https://via.placeholder.com/1000.png/00dd99';
            $image->service_id = $service->id;
            $image->save();
        }

        return redirect()->route('services.index')
            ->with('success','Service created successfully.');
    }

    //Mostra una vista per modificare un oggetto esistente
    public function edit(Service $service)
    {
        //compact è un modo veloce per scrivere ['article' => $article]
        return view('services.edit', compact('service'));
    }

    public function disable(Service $service){
        {
            $bookings = Service::find($service->id)->bookings->where('from', '<',Carbon::now("Europe/Rome")->toDateString());
            $tomail = [];
            $i=0;
            foreach ($bookings as $booking){
                $tomail[$i] = $booking->user->email;
                $i++;
            }
            if ($service->availability) {
                foreach ($tomail as $mail){
                    \Mail::raw('Il servizio '.$service->name.' che avevi prenotato non è più disponibile, sarai presto rimborsato.', function($message) use ($mail) {
                        $message->to($mail)
                            ->subject("Servizio disabilitato");
                    });
                }
                Service::find($service->id)->update(['availability' => 0]);
                $services = Service::orderBy('name')->Paginate(8);
                return redirect()->route('services.index', ['services' => $services])->with('success', 'Service disabled successfully.');
            } else {
                Service::find($service->id)->update(['availability' => 1]);
                $services = Service::orderBy('name')->Paginate(8);
                return redirect()->route('services.index', ['services' => $services])->with('success', 'Service enabled successfully.');
            }
        }
    }

    //aggiorana nel database l'oggetto con la modifica
    public function update(Service $service, Request $request)
    {
        $this->validateService($request);
        if ($service->availability == 1 && $request->availability == 0){
            //TODO Inviare mail di rimborso se viene disabilitato il servizio
        }
        $service->update($request->all());

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('storage'), $name);

                $image = new ImageService();
                $image->path = $name;
                $image->service_id = $service->id;
                $image->save();
            }
        }

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }

    //elimina l'oggetto dal database
    public function destroy(Service $service)
    {
        if ($service->availability) {     //controllo se ci sono prenotazioni che check-out che supera la data odierna
            $bookings = $service->bookings()->whereDate('to', '>=', now()->toDateString())->get();
            if (!($bookings->isEmpty())) {
                return redirect()->route('services.index')
                    ->with('error', 'There is one or more bookings for this room.');
            }
        }
        $service->delete();
        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully');
    }

    protected function validateService(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'price' => 'required|numeric',
        ]);
    }

}
