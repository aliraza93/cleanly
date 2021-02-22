<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TimingOverride;

class TimingOverrideController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.timing_override');
    }

    public function TimingList(Request $request){
        
        $timing = TimingOverride::orderBy('id')->paginate(10);
        
        return $timing;
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
        //$day = json_encode($request->days);
        //$key = explode(',',$day);
        //$time = isset($request->mon_start_time) ? $request->mon_start_time : '';
        
        //dd($exploded[0]);
        $request->validate([
         
            'date' => 'required|unique:timing_overrides',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
        ]);
        try{
            $timing = new TimingOverride;
            //$days = array_pluck($request->days, 'name');
            //$d = json_encode($days);
            //$timing->days = $d;
            $date = $request->date;
            $exploded = explode('T', $date);
            $timing->date = $exploded[0];
            $timing->start_time = isset($request->start_time) ? $request->start_time : '';
            $timing->end_time = isset($request->end_time) ? $request->end_time : '';
            $timing->save();

            return response()->json(['status'=>'success','message'=>'TimingOverride Added Successfully !']);
        }
        catch(\Exception $e)
        {
         
            return response()->json(['status'=>'error','message'=>'Something Went Wrong !']);

        }
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
    public function edit(TimingOverride $timing)
    {
        return $timing;
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
        try{
            $timing = TimingOverride::find($id);

            $timing->mon_start_time = isset($request->mon_start_time) ? $request->mon_start_time : '';
            $timing->mon_end_time = isset($request->mon_end_time) ? $request->mon_end_time : '';
            $timing->tues_start_time = isset($request->tues_start_time) ? $request->tues_start_time : '';
            $timing->tues_end_time = isset($request->tues_end_time) ? $request->tues_end_time : '';
            $timing->wednes_start_time = isset($request->wednes_start_time) ? $request->wednes_start_time : '';
            $timing->wednes_end_time = isset($request->wednes_end_time) ? $request->wednes_end_time : '';
            $timing->thurs_start_time = isset($request->thurs_start_time) ? $request->thurs_start_time : '';
            $timing->thurs_end_time = isset($request->thurs_end_time) ? $request->thurs_end_time : '';
            $timing->fri_start_time = isset($request->fri_start_time) ? $request->fri_start_time : '';
            $timing->fri_end_time = isset($request->fri_end_time) ? $request->fri_end_time : '';
            $timing->satur_start_time = isset($request->satur_start_time) ? $request->satur_start_time : '';
            $timing->satur_end_time = isset($request->satur_end_time) ? $request->satur_end_time : '';
            $timing->sun_start_time = isset($request->sun_start_time) ? $request->sun_start_time : '';
            $timing->sun_end_time = isset($request->sun_end_time) ? $request->sun_end_time : '';
            $timing->update();

            return response()->json(['status'=>'success','message'=>'TimingOverride Updated Successfully !']);
        }
        catch(\Exception $e)
        {
         
            return response()->json(['status'=>'error','message'=>'Something Went Wrong !']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimingOverride $timing)
    {
        $timing->delete();
    }
}
