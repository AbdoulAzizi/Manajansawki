<?php

namespace App\Http\Controllers;
use App\UserInfo;
use Illuminate\Http\Request;
use App\Helpers\UserSystemInfoHelper;
use Illuminate\Support\Facades\DB;

class UserSystemInfoController extends Controller
{
    function getusersysteminfo()
    {
        $getip = UserSystemInfoHelper::get_ip();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $getdevice = UserSystemInfoHelper::get_device();
        $getos = UserSystemInfoHelper::get_os();

        echo "<center>$getip <br> $getdevice <br> $getbrowser <br> $getos</center>";
    }
    public function show(Request $request)
    {
        //
        $userInfos=DB::table('sessions')->get();
        //$userInfos = UserInfo::find($id);
        //$userInfos = DB::table('sessions')->find($id);

       // $userInfos = $request->session()->all();
        //$userInfos = $request->session()->pull('user_id');


        //$userInfos = UserInfo::find(2);
        return view('sessions.userinfos',compact('userInfos'));

    }
    public function index(){
        $sessions=UserInfo::latest()->paginate(5);
        return view('sessions.index',compact('sessions'));

    }
     function userInfos(){
        $usersinfos=DB::table('sessions')->get();
        return view('sessions.userinfos',compact('usersinfos'));

    }

    public function destroy(UserInfo $userInfo,$id)
    {
        //
        $userInfo = DB::table('sessions')->find($id);

        return redirect()->route('sessions.index')
            ->with('success','Session deleted successfully');
    }
}
