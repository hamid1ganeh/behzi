<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Enums\DomainStatus;
use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\DomainDetail;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'  =>'required|unique:domains',
            'page_id'  =>'required'
        ],
        [
            'name.required'=>'نام دامنه را وارد کنید'
        ]);
        $domain = new Domain();
        $domain->name = $request->name;
        $domain->page_id = $request->page_id;
        $domain->user_id = auth()->id();
        $domain->status = DomainStatus::Pending;
        $domain->save();
        return redirect()->route('userPanel.pages.show',$domain->page_id );
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'              =>'required|unique:domains',
            'domain_id'         =>'required',
            'title'             =>'required',
            'aboutUs'           =>'required',
            'privacyPolicy'     =>'required',
        ],
            [
                'name.required'=>'نام دامنه را وارد کنید'
            ]);
        $detail = DomainDetail::find($request->domain_id);
        if ($detail == null)
        {
            $detail = new DomainDetail();
            $detail->domain_id = $request->domain_id;
            $detail->title = $request->title;
            $detail->aboutUs = $request->aboutUs;
            $detail->privacyPolicy = $request->privacyPolicy;
        }
        else
        {
            $detail->title = $request->title;
            $detail->aboutUs = $request->aboutUs;
            $detail->privacyPolicy = $request->privacyPolicy;
        }
        $detail->save();
        $domain = $detail->domain()->first();
        return redirect()->route('userPanel.pages.show',$domain->page_id );
    }

}
