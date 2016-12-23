<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ApiSetting;
use App\Models\Brand;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Helpers\Utils;


class ApiSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $api_settings = ApiSetting::paginate(25);

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
			'secret' => 'min:3|required'
		]);
        $requestData = $request->all();
        $brand = Brand::where('user_id', Auth::user()->id)->first();
        $requestData['brand_id'] = $brand->id;

        ApiSetting::create($requestData);

        Session::flash('flash_message', 'api setting added!');

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
        $api_setting = ApiSetting::findOrFail($id);

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
        $api_setting = ApiSetting::findOrFail($id);

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
			'secret' => 'min:3|required'
		]);
        $requestData = $request->all();

        $api_setting = ApiSetting::findOrFail($id);

        $brand = Brand::findOrFail($api_setting->brand_id);

        if(! Utils::isOwner(Auth::user()->id, $brand->user_id))
            Session::flash('flash_message', 'API settings does not belong this account!');

        $api_setting->update($requestData);

        Session::flash('flash_message', 'Api settings updated!');

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
        $api_setting = ApiSetting::findOrFail($id);

        $brand = Brand::findOrFail($api_setting->brand_id);

        if(! Utils::isOwner(Auth::user()->id, $brand->user_id))
            Session::flash('flash_message', 'API settings does not belong this account!');

        $api_setting->delete();

        Session::flash('flash_message', 'Api setting deleted!');

        return redirect('api_settings');
    }
}
