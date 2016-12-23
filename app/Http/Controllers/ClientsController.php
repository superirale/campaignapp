<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\Client;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Helpers\Utils;

class ClientsController extends Controller
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
        $clients = Client::paginate(25);

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('clients.create');
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

        $requestData = $request->all();

        $brand = Brand::where('user_id', Auth::user()->id)->first();

        $requestData['brand_id'] = $brand->id;


        Client::create($requestData);

        Session::flash('flash_message', 'Client added!');

        return redirect('clients');
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
        $client = Client::findOrFail($id);

        return view('clients.show', compact('client'));
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
        $client = Client::findOrFail($id);

        return view('clients.edit', compact('client'));
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

        $requestData = $request->all();

        $client = Client::findOrFail($id);

        $brand = Brand::findOrFail($client->brand_id);

        if(! Utils::isOwner(Auth::user()->id, $brand->user_id))
            Session::flash('flash_message', 'Client settings does not belong to this account!');

        $client->update($requestData);

        Session::flash('flash_message', 'Client updated!');

        return redirect('clients');
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
        $client = Client::findOrFail($id);

        $brand = Brand::findOrFail($client->brand_id);

        if(! Utils::isOwner(Auth::user()->id, $brand->user_id))
            Session::flash('flash_message', 'Client settings does not belong to this account!');

        $client->delete();

        Session::flash('flash_message', 'Client deleted!');

        return redirect('clients');
    }
}
