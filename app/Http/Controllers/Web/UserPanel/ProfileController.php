<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\V1\UserService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = \Auth::user();
        return view('user-panel.profile.show',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'  =>  'required'
        ]);
        $user = \Auth::user();
        $user->name = $request->name;
        $user->save();
        return  redirect()->back();
    }

    public function setAvatar(Request $request)
    {
        $request->validate([
            'original_image' => 'required|base64image',
            'updated_image' => 'required|base64image'
        ]);
        $userService = new UserService();
        $user = User::find(\Auth::id());
        if ($user->hasAvatar())
            $userService->updateUserAvatar($user, $request->get('updated_image'));
        else
            $userService->storeUserAvatar($user, $request->get('updated_image'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
