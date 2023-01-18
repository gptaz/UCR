<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->accesslevel>=3) return redirect('home');
        $rentals = Rental::all();
        return view('rental',compact('rentals'));
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
        $rental = new Rental();
        $device = Device::find($request->get('deviceID'));
        if($request->get('insurance')=="on"){
            $rental->insurance = '10';
        }
        $rental->deviceID = $request->get('deviceID');
        $rental->userID = Auth::user()->id;
        $rental->rentalDuration = $request->get('duration');
        $totalPrice = $request->get('duration') * $device->rentalPrice;
        $rental->totalPrice = $totalPrice;
        $rental->deposit = '50';
        $rental->rentalDate = date(DATE_ATOM);
        $user = Auth::user();
        if($user->balance < $totalPrice + $rental->insurance + $rental->deposit){
            $msg = "Insufficient Funds. Please topup to rent a device !";
            return view('viewdevice',compact('device','msg'));
        }
        $user->balance = ($user->balance - $totalPrice - $rental->insurance - $rental->deposit)*0.9;
        $rental->save();
        $user->save();
        $msg = "Your order has been placed successfully !";
        return view('viewdevice',compact('device','msg'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        return view('confirmRental',compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rental $rental)
    {
        $user = User::find($rental->userID);
        $rental->damageStatus = $request->get('damageStatus');
        $rental->details = $request->get('details');
        if($rental->damageStatus=='0')
        {
            $rental->deposit = '0';
            $user->balance = $user->balance + 50;
        }elseif($rental->damageStatus=='1'){
            if($rental->insurance!=0)
            {
                $rental->Penalty = 0;
            }else{
                $rental->Penalty = 100;
            }
            $rental->deposit = '0';
            $user->balance = $user->balance + 50 - $rental->Penalty;
            $user->blacklist+= 1;
        }else{
            if($rental->insurance!=0)
            {
                $rental->Penalty = 0;
            }else{
                $rental->Penalty = 500;
            }
            $rental->deposit = '0';
            $user->balance = $user->balance + 50 - $rental->Penalty;
            $user->blacklist+= 1;
        }
        $user->save();
        $rental->rentalStatus += 1;
        $rental->save();
        return redirect('rental');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
