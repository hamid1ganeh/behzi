<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use App\Services\V1\AuthService;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->middleware('throttle:3,1')->only('login');
        $this->authService = $authService;
    }
    public function loginPage()
    {
        if (Auth::check())
            return  redirect()->route('userPanel.index');
        else
            return view('user-panel.login');
    }
    public function register(Request $request)
    {
        $request->validate([
           'mobile'=>'required|min:11|max:11'
        ]);
        $res = $this->authService->register($request->mobile);
        if ($res == null)
            return response()->json(
                [
                    'message'=>'دوباره تلاش کنید'
                ],500
            );
        else
            return response()->json(
                [
                    'mobile'=>$res->mobile
                ]
            );
    }
    public function login(Request $request)
    {
        $request->validate([
            'mobile'=>'required',
            'code'=>'required'
        ]);
        $res = $this->authService->login($request);
        if ($res)
        {
            $user = User::find(Auth::id());
            $isSetCity = $user->getCityId() == null ? true : false;
            return response()->json([
                'setCity'=>$isSetCity,
            ]);
        }
        else
        {
            return response()->json('اطالاعات درست نیست',401);
        }
    }
    public function logout()
    {
        Auth::logout();
//        session()->forget('page_id');
        return redirect()->route('front.index');
    }
    public function setPage(Page $page)
    {
        session(['page_id' => $page->id]);
        return redirect()->route('userPanel.index');
    }
    public function setCity(Request $request)
    {
        $request->validate([
            'city_id'=>'required',
        ]);


        $user = User::find(Auth::id());
        if ($user != null)
        {

            $user->city_id = $request->city_id;
            $user->save();
        }
        else
        {
            return response()->json("لطفا دوباره وارد شوید",401);
        }
        return response()->json();
    }
}
