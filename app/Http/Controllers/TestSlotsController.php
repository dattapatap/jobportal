<?php

namespace App\Http\Controllers;

use App\Models\Admin\TestSlots;
use App\Rules\ValidTimeOfOneHour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestSlotsController extends Controller
{

    public function index()
    {
        $slots = TestSlots::where('deleted_at', null)->paginate(10);
        return view('admin.assessment.testslots.index', compact('slots'));
    }

    public function create()
    {
        return view('admin.assessment.testslots.create');
    }

    public function store(Request $request)
    {
        $startTime = Carbon::parse($request->post('from'));
        $endTime = Carbon::parse($request->post('to'));
        $totalDuration =  $startTime->diffInMinutes($endTime);
        $this->validate($request, [
            'desc' => 'required',
            'from' => 'required|date_format:H:i',
            'to' => ['required','date_format:H:i','after:from',new ValidTimeOfOneHour($totalDuration)],
        ]);

        $timeSlot = new TestSlots;
        $timeSlot->description = $request->post('desc');
        $timeSlot->from = $request->post('from');
        $timeSlot->to = $request->post('to');
        $timeSlot->status = "Active";
        $timeSlot->save();
        return redirect()->route('admin.testslots.index')->with('success', 'Slot Added successfully');;;
    }


    public function show(TestSlots $testSlots)
    {

    }

    public function status(Request $request, $id)
    {
        $testSlots = TestSlots::find($id);
        if($testSlots->status=="Active"){
            $testSlots->status="InActive";
        }else{
            $testSlots->status="Active";
        }
        $testSlots->save();
        return redirect()->route('admin.testslots.index')->with('success', 'Status Changed successfully');;
    }

    public function edit(TestSlots $testSlots, $id)
    {
        $slots = $testSlots::findOrFail($id);
        return view('admin.assessment.testslots.edit', compact('slots'));
    }

    public function update(Request $request, $id)
    {
        $timeSlot = TestSlots::findOrFail($id);
        $startTime = Carbon::parse($request->post('from'));
        $endTime = Carbon::parse($request->post('to'));
        $totalDuration =  $startTime->diffInMinutes($endTime);

        $this->validate($request, [
            'desc' => 'required',
            'from' => 'required|date_format:H:i',
            'to' => ['required','date_format:H:i','after:from',new ValidTimeOfOneHour($totalDuration)],
        ]);

        $timeSlot->description = $request->post('desc');
        $timeSlot->from = $request->post('from');
        $timeSlot->to = $request->post('to');
        $timeSlot->save();
        return redirect()->route('admin.testslots.index')->with('success', 'Slot updated successfully');
    }

    public function destroy(TestSlots $testSlots, $id)
    {
        $testSlots = TestSlots::find($id);
        $testSlots->delete();
        return redirect()->route('admin.testslots.index')->with('success', 'Slot deleted successfully');
    }
}
