<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\smtp_setting;
use Illuminate\Http\Request;
use Session;

class smtp_settingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $smtp_settings = smtp_setting::paginate(25);

        return view('smtp_settings.index', compact('smtp_settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('smtp_settings.create');
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
			'host' => 'min:3|required',
			'port' => 'min:2|integer|required'
		]);
        $requestData = $request->all();
        
        smtp_setting::create($requestData);

        Session::flash('flash_message', 'smtp_setting added!');

        return redirect('smtp_settings');
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
        $smtp_setting = smtp_setting::findOrFail($id);

        return view('smtp_settings.show', compact('smtp_setting'));
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
        $smtp_setting = smtp_setting::findOrFail($id);

        return view('smtp_settings.edit', compact('smtp_setting'));
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
			'host' => 'min:3|required',
			'port' => 'min:2|integer|required'
		]);
        $requestData = $request->all();
        
        $smtp_setting = smtp_setting::findOrFail($id);
        $smtp_setting->update($requestData);

        Session::flash('flash_message', 'smtp_setting updated!');

        return redirect('smtp_settings');
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
        smtp_setting::destroy($id);

        Session::flash('flash_message', 'smtp_setting deleted!');

        return redirect('smtp_settings');
    }
}
