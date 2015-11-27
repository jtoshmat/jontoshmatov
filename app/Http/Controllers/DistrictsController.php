<?php

namespace app\Http\Controllers;

use app\District;
use app\Organization;
use Illuminate\Http\Request;
use app\Http\Requests;
use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\Request $request)
    {

        if ($request::isMethod('post')) {
            $validator = Validator::make(Input::all(), District::$groupUpdateRules);
            //if ($validator->passes()) { @TODO fix this to accept array in Group::$groupUpdateRules

            if ($validator->passes()) {
                if (District::updateGroups($request)) {
                    return Redirect::to('/districts')->with('message', 'The following errors occurred')->withErrors
                    ('Update success')->with('flag', 'success');
                }
                return Redirect::to('/districts')->with('message', 'The following errors occurred')->withErrors
                ('Update failed')->with('flag', 'danger');
            }

            return Redirect::to('/districts')->with('message', 'The following errors occurred')->withErrors
            ($validator)->withInput()->with('flag', 'danger');
        }

	    $allorganizations = Organization::all();

        $data = District::with('organization')->paginate(25);
        return view('districts/all',compact('data', 'allorganizations'));
    }

	public function district(){
		$id = (int) \Request::segment(2);
		$data = District::with('organization')->find($id);

		return view('districts/district',compact('data'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
