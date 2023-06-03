<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Filters\Admin\AdminFilter;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\V1\AdminService;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    private $adminService;

    public function __construct()
    {
        $this->adminService = new AdminService();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $adminFilter = new AdminFilter($request);

        $this->bulkOperation($request);

        $admins = Admin::withTrashed()->orderBy('updated_at', 'desc')->filter($adminFilter)->paginate(10);

        return view('admin-panel.admins.index', compact([
            'admins'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin-panel.admins.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, ['password' => 'required|confirmed']);

        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'status' => $request->get('status'),
            'password' => bcrypt($request->get('password')),
            'roles' => $request->get('roles'),
        ];

        $admin = $this->adminService->store($data);

        return redirect()->route('adminPanel.admins.edit', $admin);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $roles = Role::all();
        return view('admin-panel.admins.edit', compact(['admin', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Admin $admin)
    {
        $this->validate($request, ['password' => 'nullable|confirmed']);

        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'status' => $request->get('status'),
            'roles' => $request->get('roles'),
        ];

        if (!is_null($request->get('password'))) {
            $data['password'] = bcrypt($request->get('password'));
        }

       $this->adminService->update($admin, $data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return back();
    }

    public function recycle(Admin $admin)
    {
        $admin->restore();

        return back();
    }

    private function bulkOperation(Request $request)
    {

    }
}
