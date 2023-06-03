<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Http\Controllers\Controller;
use App\Services\V1\RoleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    private $roleService;

    public function __construct()
    {
        $this->roleService = new RoleService();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('updated_at', 'desc')->paginate(10);

        return view('admin-panel.roles.index', compact([
            'roles'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin-panel.roles.create', compact(['permissions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data['name'] = $request->get('name');
        $data['permissions'] = $request->get('permissions');

        $role = $this->roleService->store($data);

        return redirect()->route('adminPanel.roles.edit', $role);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin-panel.roles.edit', compact(['role', 'permissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  Role $role
     * @return Response
     */
    public function update(Request $request, Role $role)
    {
        $data['name'] = $request->get('name');
        $data['permissions'] = $request->get('permissions');

        $this->roleService->update($role, $data);

        return back();
    }


}
