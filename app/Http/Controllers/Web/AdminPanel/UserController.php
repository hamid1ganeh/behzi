<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Enums\UserStatus;
use App\Filters\Admin\UserFilter;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\V1\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userFilter = new UserFilter($request);

        $this->bulkOperation($request);

        $users = User::withTrashed()->orderBy('updated_at', 'desc')->filter($userFilter)->paginate(10);

        return view('admin-panel.users.index', compact([
            'users'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
            'status' => $request->get('status')
        ];

        $user = $this->userService->store($data);

        return redirect()->route('adminPanel.users.edit', $user);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin-panel.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = [
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
            'status' => $request->get('status')
        ];

        $this->userService->update($user, $data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }

    public function recycle(User $user)
    {
        $user->restore();

        return back();
    }

    private function bulkOperation(Request $request)
    {
        if ($request->has('bulk_operation_item_select')) {
            $action = $request->get('action');
            $targetCategoriesId = $request->get('bulk_operation_item_select');

            if ($action == 0) {
                User::whereIn('id', $targetCategoriesId)->update([
                    'status' => UserStatus::Pending
                ]);
            } else if ($action == 1) {
                User::whereIn('id', $targetCategoriesId)->update([
                    'status' => UserStatus::Active
                ]);
            } else if ($action == 2) {
                User::whereIn('id', $targetCategoriesId)->update([
                    'status' => UserStatus::Ban
                ]);
            } else if ($action == 3) {
                User::whereIn('id', $targetCategoriesId)->delete();
            } else if ($action == 4) {
                User::whereIn('id', $targetCategoriesId)->restore();
            }
        }
    }
}
