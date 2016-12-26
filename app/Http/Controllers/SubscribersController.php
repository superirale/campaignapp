<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Session;

use \League\Csv\Writer;
use \League\Csv\Reader;
use CampaignApp\Adapters\Contracts\SubscriberCsvInterface;

class SubscribersController extends Controller
{
    function __construct(SubscriberCsvInterface $csv)
    {
        $this->CsvUploader = $csv;
    }
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

    public function uploadSubscribers(Request $request, $list_type_id)
    {

         if($request->hasFile("file")){

            $results = $this->CsvUploader->readCSV($request->file('file'));
            $count = 0;

            foreach ($results as $row) {
            //put isset check in the row elements
                if($count > 0){

                    $sub = new Subscriber();
                    $sub->name = $row[0];
                    $sub->email = $row[1];
                    $sub->phone = $row[2];
                    $sub->gender = $row[3];
                    $sub->age = $row[4];
                    $sub->list_type_id = $list_type_id;
                    $sub->save();
                    Session::flash('flash_message', 'CSV uploaded!');

                }
                $count++;
            }
            return response()->json(["status"=> "done"]);
        }
    }

    public function exportSubscribers(Request $request, $list_type_id)
    {
        $subscribers = Subscriber::all()->toArray();
        $this->CsvUploader->writeCSV($subscribers, "subscribers");
    }
}