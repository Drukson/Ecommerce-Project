<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShippingAreaController extends Controller
{
    public function DivisionView()
    {
        $division = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.ship.division.division_view', compact('division'));
    }

    public function AddDivision(Request $request)
    {
        $validate = $request->validate([
            'division_name' => 'required'
        ]);
        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Division Added',
            'alert-type' => 'success'
        );
        return Redirect::route('division_view')->with($notification);
    }

    public function EditDivision($id)
    {
        $division = ShipDivision::find($id);
        return view('backend.ship.division.division_edit', compact('division'));
    }

    public function UpdateDivision(Request $request, $id)
    {
        ShipDivision::find($id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Division Updated',
            'alert-type' => 'success'
        );
        return Redirect::route('division_view')->with($notification);
    }

    public function DeleteDivision($id)
    {
        $division = ShipDivision::find($id);
        $division->delete();
        $notification = array(
            'message' => 'Division Deleted',
            'alert-type' => 'info'
        );
        return Redirect::route('division_view')->with($notification);
    }


    /*SUB DISTRICTS STARTS*/
    public function SubDistrictView()
    {
        $division = ShipDivision::orderBy('id', 'ASC')->get();
        $places = ShipDistrict::orderBy('id', 'DESC')->get();
        return view('backend.ship.district.district_view', compact('division', 'places'));
    }

    public function AddSubDistrict(Request $request)
    {
        $validate = $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);
        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Places Added',
            'alert-type' => 'success'
        );
        return Redirect::route('subdistrict_view')->with($notification);
    }

    public function EditSubDistrict($id)
    {
        $division = ShipDivision::orderBy('division_name', 'ASC')->get();
        $subdistrict = ShipDistrict::find($id);

        return view('backend.ship.district.district_edit', compact('division', 'subdistrict'));
    }

    public function UpdateSubDistrict(Request $request, $id)
    {
        ShipDistrict::find($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Places Updated',
            'alert-type' => 'success'
        );
        return Redirect::route('subdistrict_view')->with($notification);
    }

    public function DeleteSubDistrict($id)
    {
        $sub = ShipDistrict::find($id);
        $sub->delete();

        $notification = array(
            'message' => 'Places Deleted',
            'alert-type' => 'success'
        );
        return Redirect::route('subdistrict_view')->with($notification);
    }

}
