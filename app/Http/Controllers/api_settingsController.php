<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\api_setting;
use Illuminate\Http\Request;
use Session;

class api_settingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $api_settings = api_setting::paginate(25);

        return view('api_settings.index', compact('api_settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('api_settings.create');
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
			'key' => 'min:3|required',
			'secret' => 'min:3|required',
			'brand_id' => 'mmin:1|intger|required'
		]);
        $requestData = $request->all();
        
        api_setting::create($requestData);

        Session::flash('flash_message', 'api_setting added!');

        return redirect('api_settings');
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
        $api_setting = api_setting::findOrFail($id);

        return view('api_settings.show', compact('api_setting'));
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
        $api_setting = api_setting::findOrFail($id);

        return view('api_settings.edit', compact('api_setting'));
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
			'key' => 'min:3|required',
			'secret' => 'min:3|required',
			'brand_id' => 'mmin:1|intger|required'
		]);
        $requestData = $request->all();
        
        $api_setting = api_setting::findOrFail($id);
        $api_setting->update($requestData);

        Session::flash('flash_message', 'api_setting updated!');

        return redirect('api_settings');
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
        api_setting::destroy($id);

        Session::flash('flash_message', 'api_setting deleted!');

        return redirect('api_settings');
    }
}
