<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use Illuminate\Http\Request;
use Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $brand = Brand::paginate(25);

        return view('brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('brand.create');
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
			'name' => 'min:3|required',
			'from_name' => 'min:3|required',
			'from_email' => 'min:10|max:50|required',
			'reply_email' => 'min:10|max:50|required'
		]);
        $requestData = $request->all();

        Brand::create($requestData);

        Session::flash('flash_message', 'Brand added!');

        return redirect('brand');
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
        $brand = Brand::findOrFail($id);

        return view('brand.show', compact('brand'));
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
        $brand = Brand::findOrFail($id);

        return view('brand.edit', compact('brand'));
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
			'name' => 'min:3|required',
			'from_name' => 'min:3|required',
			'from_email' => 'min:10|max:50|required',
			'reply_email' => 'min:10|max:50|required'
		]);
        $requestData = $request->all();

        $brand = Brand::findOrFail($id);
        $brand->update($requestData);

        Session::flash('flash_message', 'Brand updated!');

        return redirect('brand');
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
        Brand::destroy($id);

        Session::flash('flash_message', 'Brand deleted!');

        return redirect('brand');
    }
}
