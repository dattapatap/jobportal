<?php
namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index(Request $request){
        if(isset(Auth::user()->id)){
            $notification = DatabaseNotification::where('notifiable_id', Auth::user()->id)->orderBy('created_at',"DESC")->get();
            return view('employee.notifications',  compact('notification'));
        }
        abort(403, 'Unauthorized action.');
    }

    public function markAsRead(Request $request)
    {
        if($request->post('id')){
            auth()->user()->unreadNotifications->where('id', $request->post('id'))->markAsRead();
            return response()->json(["success", "Marked as read"]);
        }else{
            auth()->user()->unreadNotifications->markAsRead();
            return response()->json(["success", "Marked as read"]);
        }
    }

}
