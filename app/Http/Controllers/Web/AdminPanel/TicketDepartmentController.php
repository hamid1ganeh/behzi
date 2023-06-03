<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\TicketDepartment;
use Illuminate\Http\Request;

class TicketDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = TicketDepartment::all();
        $admins = Admin::all();

        return view('admin-panel.tickets.departments.index', compact([
            'departments',
            'admins'
        ]));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $department = TicketDepartment::create($request->only(['name', 'status']));
        $department->operators()->sync($request->get('operator'));
        return back();
    }

}
