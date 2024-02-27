<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cmsPages;


class cmsController extends Controller
{
    //
    public function cmsPages()
    {
        $cmsPages = cmsPages::all();

        return view('admin.cmsPages.cmsPages', compact('cmsPages'));
    }
    public function create_cmPages()
    {
        return view('admin.cmsPages.create_cm');
    }
    public function cmsPagesStore(Request $request)
    {
        $request->validate([
            'content'=>'required'
        ]);
        $cmsPages = new cmsPages();
        $cmsPages->cmsPages = $request->cmsPages;
        $cmsPages->content = $request->content;
        $cmsPages->status = $request->status;
        $cmsPages->save();
        return redirect('cmsPages')->with('success', 'Recored hes been Saved Successfull.');

    }
    public function updateStatus(Request $request)
    {
        $status = cmsPages::find($request->id);
        $status->status = $request->input('status');
        $status->save();
        return response()->json(['message' => 'Status updated successfully']);
    }
    public function cmsPageEdit($id)
    {
        $cmsPages = cmsPages::find($id);
        return view('admin.cmsPages.edit_cm', compact('cmsPages'));
    }
    public function cmsPagesUpdate(Request $request)
    {
        $request->validate([
            'content'=>'required'
        ]);
        $cmsPages = cmsPages::find($request->id);
        $cmsPages->cmsPages = $request->cmsPages;
        $cmsPages->content = $request->content;
        $cmsPages->status = $request->status;
        $cmsPages->save();
        return redirect('cmsPages')->with('success', 'Recored hes been Saved Successfull.');
    }
    public function DeleteCmsPages(Request $request)
    {
        try{
        cmsPages::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }


}
