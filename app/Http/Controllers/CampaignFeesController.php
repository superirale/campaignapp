<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CampaignFee;
use Illuminate\Http\Request;
use Session;

class CampaignFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $campaignfees = CampaignFee::paginate(25);

        return view('campaign-fees.index', compact('campaignfees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('campaign-fees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'currency' => 'min:3|required',
			'no_of_emails_per_month' => 'min:1|required',
			'delivery_fee' => 'integer',
			'cost_per_recipient' => 'integer'
		]);
        $requestData = $request->all();
        
        CampaignFee::create($requestData);

        Session::flash('flash_message', 'CampaignFee added!');

        return redirect('campaign-fees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $campaignfee = CampaignFee::findOrFail($id);

        return view('campaign-fees.show', compact('campaignfee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $campaignfee = CampaignFee::findOrFail($id);

        return view('campaign-fees.edit', compact('campaignfee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'currency' => 'min:3|required',
			'no_of_emails_per_month' => 'min:1|required',
			'delivery_fee' => 'integer',
			'cost_per_recipient' => 'integer'
		]);
        $requestData = $request->all();
        
        $campaignfee = CampaignFee::findOrFail($id);
        $campaignfee->update($requestData);

        Session::flash('flash_message', 'CampaignFee updated!');

        return redirect('campaign-fees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        CampaignFee::destroy($id);

        Session::flash('flash_message', 'CampaignFee deleted!');

        return redirect('campaign-fees');
    }
}
