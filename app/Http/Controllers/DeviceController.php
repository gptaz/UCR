<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class DeviceController extends Controller
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
        $devices = Device::all();
        return view('device',compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $msg = '';
        return view('addDevice',compact('msg'));

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
            'image' => 'required|mimes:png,gif,jpg,jpeg|max:2048',
        ]);
        $device = new Device();

        $device->brand = $request->get('brand');
        $device->rentalPrice = $request->get('rentalPrice');
        $device->quantity = $request->get('quantity');
        $device->OS = $request->get('OS');
        $device->displaySize = $request->get('displaySize');
        $device->RAM = $request->get('RAM');
        $device->USBPort = $request->get('USBPort');
        $device->HDMIPort = $request->get('HDMIPort');
        $device->description = $request->get('description');

        $image = $request -> file('image');
        $path = 'images/device'; // [path to laravelapp]/myApp/public/uploaded
        $time = date("d-m-Y")."-".time();
        $filename = $time.$image->getClientOriginalName(); // can be customised
        $image -> move($path, $filename);
        $device->image = $path."/".$filename;

        //return $device;
        $device->save();
        $msg = "New device has been added successfully !";
        return view('addDevice',compact('msg'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        $msg = '';
        //return $device;
        return view('editDevice',compact('device','msg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //
        $device->brand = $request->get('brand');
        $device->rentalPrice = $request->get('rentalPrice');
        $device->quantity = $request->get('quantity');
        $device->OS = $request->get('OS');
        $device->displaySize = $request->get('displaySize');
        $device->RAM = $request->get('RAM');
        $device->USBPort = $request->get('USBPort');
        $device->HDMIPort = $request->get('HDMIPort');
        $device->description = $request->get('description');

        $image = $request->file('image');
        //return $image->getClientOriginalName();
        if(!is_null($image))
        {
            $path = 'images/device'; // [path to laravelapp]/myApp/public/uploaded
            $time = date("d-m-Y")."-".time();
            $filename = $time.$image->getClientOriginalName(); // can be customised
            $image -> move($path, $filename);
            $device->image = $path."/".$filename;
        }


        //return $device;
        $device->save();
        $msg = "Device information has been updated successfully !";
        return view('editDevice',compact('msg','device'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        $device->delete();
        return redirect('device');
    }
}
