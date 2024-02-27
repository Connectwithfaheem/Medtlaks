<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiriesController extends Controller
{
    //
    public function store(Request $request)
    {
        $store = new Enquiry;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->subject = $request->subject;
        $store->massage = $request->message;
        $store->save();
        return redirect()->back()->with('success', "Thank You! We have received your query successfully.");


    }
    public function enquiry()
    {
        $enquiries = Enquiry::orderBy('id', 'desc')->get();
        return view('admin.Enquiries.Enquiry',compact('enquiries'));
    }

    public function DeleteEnquiry(Request $request)
    {
        try{
            Enquiry::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Enquiry has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }

}
