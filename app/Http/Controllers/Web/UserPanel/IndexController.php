<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $pages = $user->pages()->get();
        $page = Page::find(session('page_id'));
        return view('user-panel.index',compact(['page']));
    }
}
