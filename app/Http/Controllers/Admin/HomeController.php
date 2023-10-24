<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\delete;


class HomeController extends Controller
{
    public function index()
    {
        $startDate = Carbon::now()->subHours(48);
        $products = product::all()->count();
        $users = User::all()->count();
        $ordersCount =  Order::all()->where('oder_date', '>=', $startDate)->count();
        $ordersCountAlltime = Order::all()->count();
        $total = Order::sum('total');
        $totalPerDay = Order::where('oder_date', '>=', $startDate)->sum('total');
        $orders = Order::all();
        return view('Admin.panel',compact('orders','ordersCount','users','products','total','totalPerDay','ordersCountAlltime'));
    }
    public function getCategory()
    {
        $cat = DB::table('categories')->get();
        return view('Admin.product', compact('cat'));
    }
    public function deleteAdmin($id){
        if(isset($id)){
           $admin = Admin::findOrFail($id)->delete();
           return back()->with('message','deleted');
        }
        return back();
    }
}

