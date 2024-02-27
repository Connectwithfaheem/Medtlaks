<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GlobalSetup;

class GlobalSetupController extends Controller
{
    //
    public function global()
    {
        $setup = GlobalSetup::all();
        return view('admin.GlobalSetup.GlobalSetup', compact('setup'));
    }
    public function createGlobal()
    {
        return view('admin.GlobalSetup.createGlobalSetup');
    }
    
    public function createSetup(Request $request)
{
    $setup = new GlobalSetup;
    $imageName = null; // Initialize $imageName to null

    if ($request->hasFile('logo')) {
        $imageName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('logo'), $imageName);
    }

    $setup->logo = $imageName; // Set the "logo" field to $imageName, which may be null
    $setup->title = $request->title;
    $setup->email = $request->email;
    $setup->phone = $request->phone;
    $setup->address = $request->address;
    $setup->whatsapp = $request->whatsapp;
    $setup->facebook = $request->facebook;
    $setup->instagram = $request->instagram;
    $setup->linkedin = $request->linkedin;
    $setup->youtube = $request->youtube;
    $setup->save();

    return redirect('GlobalSetup');
}
    public function DeleteSetup(Request $request)
    {
        try{
        GlobalSetup::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }
    public function editSetup()
    {
        $global = GlobalSetup::all();
        return view('admin.GlobalSetup.editSetup', compact('global'));
    }

    public function updateSetup(Request $request)
{
    $setup = GlobalSetup::find($request->id);

    if ($request->hasFile('logo')) {
        $imageName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('logo'), $imageName);
        $setup->logo = $imageName;
    } else {
        $setup->logo = null; // Set the "logo" field to null if no file is provided
    }

    $setup->title = $request->title;
    $setup->email = $request->email;
    $setup->phone = $request->phone;
    $setup->address = $request->address;
    $setup->whatsapp = $request->whatsapp;
    $setup->facebook = $request->facebook;
    $setup->instagram = $request->instagram;
    $setup->linkedin = $request->linkedin;
    $setup->youtube = $request->youtube;
    $setup->save();

    return redirect('GlobalSetup');
}

}
