<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Session;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $subscribers = Subscriber::paginate(25);

        return view('subscribers.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('subscribers.create');
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
			'name' => 'required|min:3',
			'email' => 'required|min:10'
		]);
        $requestData = $request->all();
        
        Subscriber::create($requestData);

        Session::flash('flash_message', 'Subscriber added!');

        return redirect('subscribers');
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
        $subscriber = Subscriber::findOrFail($id);

        return view('subscribers.show', compact('subscriber'));
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
        $subscriber = Subscriber::findOrFail($id);

        return view('subscribers.edit', compact('subscriber'));
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
			'name' => 'required|min:3',
			'email' => 'required|min:10'
		]);
        $requestData = $request->all();
        
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->update($requestData);

        Session::flash('flash_message', 'Subscriber updated!');

        return redirect('subscribers');
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
        Subscriber::destroy($id);

        Session::flash('flash_message', 'Subscriber deleted!');

        return redirect('subscribers');
    }
}
