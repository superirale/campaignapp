<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Helpers\Utils;
use App\Helpers\Uploader;

class BrandsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $brand = Brand::where('user_id', Auth::user()->id)->paginate(25);

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
        $requestData['user_id'] = Auth::user()->id;

        $brand = Brand::create($requestData);

        $uploader = new Uploader();

        if($request->hasFile("logo_ref")){

            $main_dir = env("BRAND_IMAGES_DIR");
            $upload_dir = $uploader->getUploadDir($brand->id, $main_dir);

            $extension = $request->logo_ref->extension();
            $filename = uniqid().$brand->id.'.'.$extension;
            $new_filename = $upload_dir.'/'. $filename;

            $upload = $uploader->upload($request->logo_ref, $new_filename, '');
            $brand->logo_ref = $filename;
            $brand->save();
        }

        Session::flash('flash_message', 'Brand added!');

        return redirect('brands');
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

        if(! Utils::isOwner(Auth::user()->id, $brand->user_id))
            Session::flash('flash_message', 'Brand does not belong this account!');

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

        if(! Utils::isOwner(Auth::user()->id, $brand->user_id))
            Session::flash('flash_message', 'Brand does not belong this account!');

        $uploader = new Uploader();

        if($request->hasFile("logo_ref")){

            $main_dir = env("BRAND_IMAGES_DIR");
            $upload_dir = $uploader->getUploadDir($brand->id, $main_dir);

            $extension = $request->logo_ref->extension();
            $filename = uniqid().$brand->id.'.'.$extension;
            $new_filename = $upload_dir.'/'. $filename;

            //delete old image

            $upload = $uploader->upload($request->logo_ref, $new_filename, '');
            $requestData['logo_ref'] = $filename;
        }


        $brand->update($requestData);

        Session::flash('flash_message', 'Brand updated!');

        return redirect('brands');
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
        $brand = Brand::findorFail($id);

        if(! Utils::isOwner(Auth::user()->id, $brand->user_id))
            Session::flash('flash_message', 'Brand does not belong this account!');

        $brand->delete();

        Session::flash('flash_message', 'Brand deleted!');

        return redirect('brands');
    }
}
