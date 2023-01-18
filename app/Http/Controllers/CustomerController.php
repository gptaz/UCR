<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
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
        $customers = User::where('accesslevel', '3')->get();
        return view('customer',compact('customers'));
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
        $user = User::find($id);
        return view('profile',compact('user'));
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
        $user = User::find($id);
        $user->blacklist = 0;
        $user->save();
        return redirect('customer');
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

    public function profileUpdate(Request $request, $id){
        $user = User::find($id);
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');
        $user->save();
        return view('profile',compact('user'));
    }
    public function addFund(Request $request){
        $balance = Auth::User()->balance;
        $balance += $request->get('fund');
        $user = Auth::user();
        $user->balance = $balance;
        $user->save();
        return view('profile',compact('user'));
    }
    public function returnrental(){
        $rentals = Rental::where('userID', Auth::user()->id)
                            ->where('rentalStatus','0')
                            ->get();
        //return $rentals;
        $msg = '';
        return view('return',compact('rentals','msg'));
    }
    public function returning($id){
        $rental = Rental::find($id);
        $rental->rentalStatus = 1;
        $rental->save();
        $rentals = Rental::where('userID', Auth::user()->id)
            ->where('rentalStatus','0')
            ->get();
        $msg = 'Your rental has been returned successfully. Please wait for the Staff confirms.';
        return view('return',compact('rentals','msg'));
    }
}
