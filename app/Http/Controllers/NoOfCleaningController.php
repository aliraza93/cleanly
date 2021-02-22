<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoOfCleaning;

class NoOfCleaningController extends Controller
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
        return view('admin.cleaning_service');
    }

    public function CleaningList(Request $request){
        
        $cleaning = NoOfCleaning::orderBy('id','asc')->paginate(10);
        return $cleaning;

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
        try{
            $number = new NoOfCleaning;

            $number->number = $request->counter;
            $number->save();

            return response()->json(['status'=>'success','message'=>'Number of Cleaning Services Added Successfully !']);
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
    public function edit(NoOfCleaning $cleaning)
    {
        return $cleaning;
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
        $request->validate([
         
            'number' => 'required',
        ]);
       
        try{
            $number = NoOfCleaning::find($id);

            $number->number = $request->number;
            $number->update();

            return response()->json(['status'=>'success','message'=>'Number of Cleaning Service Updated Successfully !']);
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
    public function destroy(NoOfCLeaning $number)
    {
        $number->delete();
    }
}
