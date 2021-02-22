<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rates;

class RatesController extends Controller
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
        return view('admin.rates');
    }

    public function RateList(Request $request){
        
        $size = $request->size;
        $hours = $request->hours;
        $rate = Rates::orderBy('size','asc');

            if($size != ''){
             
                $rate->where('size','LIKE','%'.$size.'%');

            }

            if($hours != ''){
                 
                $rate->where('hours','LIKE','%'.$hours.'%');

            }

            
            $rate = $rate->paginate(10);
            return $rate;

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
        $request->validate([
         
            'size' => 'required|unique:rates',
            'hours' => 'required',
            'increment' => 'required',
            'base' => 'required',
        ]);
       
        try{
            $rates = new Rates;
            $increment = $request->increment;
            $rates->size = $request->size;
            $rates->hours = $request->hours;
            $rates->base = $request->base;
            $rates->increment = $increment;
            $two = $request->base + $increment;
            $rates->two_bath = $two;
            $three = $two + $increment;
            $rates->three_bath = $three;
            $four = $three + $increment;
            $rates->four_bath = $four;
            $five = $four + $increment;
            $rates->five_bath = $five;
            $six = $five + $increment;
            $rates->six_bath = $six;
            $seven = $six + $increment;
            $rates->seven_bath = $seven;
            $eight = $seven + $increment;
            $rates->eight_bath = $eight;
            $nine = $eight + $increment;
            $rates->nine_bath = $nine;
            $ten = $nine + $increment;
            $rates->ten_bath = $ten;
            $rates->save();

            return response()->json(['status'=>'success','message'=>'Rates Added Successfully !']);
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
    public function edit(Rates $rate)
    {
        return $rate;
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
         
            'size' => 'required',
            'hours' => 'required',
            'base' => 'nullable',
            'increment' => 'required',
            'two_bath' => 'nullable',
            'three_bath' => 'nullable',
            'four_bath' => 'nullable',
            'five_bath' => 'nullable',
            'six_bath' => 'nullable',
            'seven_bath' => 'nullable',
            'eight_bath' => 'nullable',
            'nine_bath' => 'nullable',
            'ten_bath' => 'nullable',
        ]);
       
        try{
            $rates = Rates::find($id);

            $increment = $request->increment;
            $rates->size = $request->size;
            $rates->hours = $request->hours;
            $rates->base = $request->base;
            $rates->increment = $increment;
            $two = $request->base + $increment;
            $rates->two_bath = $two;
            $three = $two + $increment;
            $rates->three_bath = $three;
            $four = $three + $increment;
            $rates->four_bath = $four;
            $five = $four + $increment;
            $rates->five_bath = $five;
            $six = $five + $increment;
            $rates->six_bath = $six;
            $seven = $six + $increment;
            $rates->seven_bath = $seven;
            $eight = $seven + $increment;
            $rates->eight_bath = $eight;
            $nine = $eight + $increment;
            $rates->nine_bath = $nine;
            $ten = $nine + $increment;
            $rates->ten_bath = $ten;
            $rates->update();

            return response()->json(['status'=>'success','message'=>'Rates Updated Successfully !']);
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
    public function destroy(Rates $rate)
    {
        $rate->delete();
    }
}
