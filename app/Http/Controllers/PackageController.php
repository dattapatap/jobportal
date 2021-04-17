<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::where('deleted_at', null)->paginate(10);
        return view('admin.others.package.index', compact('package'));
    }

    public function create()
    {
        return view('admin.others.package.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|string|unique:packages,name,NULL,id,deleted_at,NULL',
            'amount' => 'required',
            'validity' => 'required',
            'adds' => 'required'
        ]);
        try{
            $package = new Package();
            $package->name = ucfirst($request->post('name'));
            $package->amount = $request->post('amount');
            $package->maxdays = $request->post('validity');
            $package->maxads = $request->post('adds');
            $package->status = "Active";
            $package->save();
            return redirect()->route('admin.packages.index')->with('success', 'Package Added successfully');
        }catch(Exception $ex){
            Log::error($ex->getMessage());
            return redirect()->back()->with('error', 'Package not added please try again');
        }
    }


    public function show(Package $testSlots)
    {

    }

    public function changeStatus($id)
    {
        $package = Package::find($id);
        if($package->status=="Active"){
            $package->status= 'InActive';
        }else{
            $package->status=  'Active';
        }
        $package->save();
        return redirect()->route('admin.packages.index')->with('success', 'Status Changed successfully');;
    }

    public function edit(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        return view('admin.others.package.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:50|string|unique:packages,name,'.$request->post('id').',id,deleted_at,NULL',
            'amount' => 'required|numeric',
            'validity' => 'required|numeric',
            'adds' => 'required|numeric'
        ]);

        $package->name = ucfirst($request->post('name'));
        $package->amount = $request->post('amount');
        $package->maxdays = $request->post('validity');
        $package->maxads = $request->post('adds');
        $package->save();
        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $package = Package::find($id);
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully');
    }
}
