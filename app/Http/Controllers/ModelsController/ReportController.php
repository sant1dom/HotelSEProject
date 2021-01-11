<?php

namespace App\Http\Controllers\ModelsController;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index');
    }

    public function usersIndex()
    {
        $users = User::orderBy('name')->Paginate(10);
        return view('reports.users.index', compact('users'));
    }
}
