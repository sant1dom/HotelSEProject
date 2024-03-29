<?php

namespace App\Http\Controllers\ModelsController;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Report;
use App\Models\Service;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('reports.index');
    }

    public function usersIndex()
    {
        $users = User::orderBy('name')->get();
        return view('reports.users.index', compact('users'));
    }

    public function usersShow(User $user){
        $guests = $user->guests()->get();
        $bookings = $user->bookings()->get();
        return view('reports.users.show', compact('user', 'guests', 'bookings'));
    }

    public function servicesIndex()
    {
        $services = Service::orderBy('name')->get();
        return view('reports.services.index', compact('services'));
    }

    public function servicesReport(Service $service){
        return $this->generatePDFService($service);
    }

    public function usersReport(User $user){
        return $this->generatePDFUser($user);
    }

    protected function generatePDFUser(User $user)
    {
        $guests = $user->guests;
        $bookings = $user->bookings;
        $pdf = PDF::loadView('reportPDF', compact('user', 'guests', 'bookings'));
        return $pdf->download('report.pdf');
    }

    protected function generatePDFService(Service $service){
        $reports = $service->reports;
        $pdf = PDF::loadView('reportPDFService', compact('service', 'reports'));
        return $pdf->download('report.pdf');
    }
}
