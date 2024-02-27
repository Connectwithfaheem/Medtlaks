<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subscirbers;

class subscriber extends Controller
{
    //
    public function subcribersEmail()
    {
        $subscriber = subscirbers::all();
        return view('admin.subscriberEmail.SubscribersEmail', compact('subscriber'));
    }
    public function DeleteSubscribers(Request $request)
    {
        try{
        subscirbers::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }
}
