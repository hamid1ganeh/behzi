<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\DomainDetail;
use App\Models\Page;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function edit($id)
    {
        $domain = Domain::with('detail')->where('page_id',$id)->first();
        $page = Page::find($id);
        return view('admin-panel.pages.domain',compact(['domain','page']));
    }
    public function update($id,Request $request)
    {
        $page = Page::find($id);
        if ($page->domain()->count() > 0)
        {
            $domain = $page->domain()->first();
            $request->validate([
                'aboutUs'       =>  'required',
                'privacyPolicy' =>  'required',
//            'dns1'          =>  'required',
//            'dns2'          =>  'required',
                'name'          =>  'required|unique:domains,name,'.$domain->id,
                'title'         =>  'required',
                'status'        =>  'required',
            ]);
        }
        else
        {
            $request->validate([
                'aboutUs'       =>  'required',
                'privacyPolicy' =>  'required',
//            'dns1'          =>  'required',
//            'dns2'          =>  'required',
                'name'          =>  'required|unique:domains',
                'title'         =>  'required',
                'status'        =>  'required',
            ]);
        }


        if ($page->domain()->count() > 0)
        {
            $domain = Domain::find($page->domain()->first()->id);
            $domain->name = $request->name;
            $domain->status = $request->status;
            $domain->save();
            if ($domain->detail()->count() > 0)
            {
                $detail = $domain->detail()->first();
                $detail->domain_id    = $domain->id;
                $detail->title = $request->title;
                $detail->aboutUs = $request->aboutUs;
                $detail->privacyPolicy = $request->privacyPolicy;
                $detail->status = Status::Active;
                $detail->save();
            }
            else
            {
                $detail = new DomainDetail();
                $detail->domain_id    = $domain->id;
                $detail->title = $request->title;
                $detail->aboutUs = $request->aboutUs;
                $detail->privacyPolicy = $request->privacyPolicy;
                $detail->status = Status::Active;
                $detail->save();
            }
        }
        else
        {
          $domain = new Domain();
          $domain->user_id = $page->getOwner()->id;
          $domain->page_id = $id;
          $domain->name = $request->name;
          $domain->status = $request->status;
          $domain->save();
          $detail = new DomainDetail();
          $detail->domain_id    = $domain->id;
          $detail->title = $request->title;
          $detail->aboutUs = $request->aboutUs;
          $detail->privacyPolicy = $request->privacyPolicy;
          $detail->status = Status::Active;
          $detail->save();
        }
        return redirect()->back();
    }
}
