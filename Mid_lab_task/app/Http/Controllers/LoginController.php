<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|min:8|max:20',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = User::where('email','=',$request->email)->first();

            if ($user->type == 'admin') {
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/admin');
            } elseif($user->type == 'customer') {
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/customer');
            }elseif($user->type == 'accountant') {
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/accountant');
            }elseif($user->type == 'salesman'){
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/salesman');
            }else if($user->type == 'businesspartner'){
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/businesspartner');
            }else{
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/vendor');
            }
        }else{
            return back()->with('error','Email or password is incorrect');
        }

    }

    public function adminDashboard()
    {
        $data = User::find(session('loggedUser'));
        $count_existing_product = DB::table('products')->where('status', 'existing')->count();
        $count_upcoming_product = DB::table('products')->where('status', 'upcoming')->count();
        $today_sold=DB :: table('physical_store_channels')->whereDate('created_at', Carbon::today())->get()->count();

        $date = \Carbon\Carbon::today()->subDays(7);
        $last_7_day_sold = DB:: table('physical_store_channels')->whereDate('created_at', '>=', $date)->get()->count();
       
        $smc_today_sold=DB :: table('physical_store_channels')->whereDate('created_at', Carbon::today())->get()->count();
        $ec_today_sold=DB :: table('ecommerce_channels')->whereDate('created_at', Carbon::today())->get()->count();

        $smc_last_7_day_sold = DB:: table('social_media_channels')->whereDate('created_at', '>=', $date)->get()->count();
        $ec_last_7_day_sold = DB:: table('ecommerce_channels')->whereDate('created_at', '>=', $date)->get()->count();
       
        // return dd( $dt);
        return view('admin.include.home')->with('data',$data)
                                         ->with('existing_total_product', $count_existing_product)
                                         ->with('upcoming_total_product', $count_upcoming_product)
                                         ->with('today_sold', $today_sold)
                                         ->with('last_7_day_sold', $last_7_day_sold)
                                         ->with('smc_today_sold', $smc_today_sold)
                                         ->with('smc_last_7_day_sold', $smc_last_7_day_sold)
                                         ->with('ec_today_sold', $ec_today_sold)
                                         ->with('ec_last_7_day_sold', $ec_last_7_day_sold);
    }
    public function customerDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('customer.include.home')->with('data',$data);
    }
    public function accountantDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('accountant.include.home')->with('data',$data);
    }
    public function salesmanDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('salesman.include.home')->with('data',$data);
    }
    public function businesspartnerDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('businesspartner.include.home')->with('data',$data);
    }
    public function vendorDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('vendor.include.home')->with('data',$data);
    }
}
