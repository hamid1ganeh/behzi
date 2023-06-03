<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Page;
use App\Models\TenantMessage;
use Illuminate\Http\Request;

class TenantMessageController extends Controller
{
    public function index($page)
    {
        $messages = $page->tenant_messages()->orderBy('created_at','DESC')->paginate(5);
        return  view('user-panel.pages.domain.messages.index',compact(['messages','page']));
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

    public function show(Page $page,TenantMessage $message)
    {
        return view('user-panel.pages.domain.messages.show',compact(['page','message']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
