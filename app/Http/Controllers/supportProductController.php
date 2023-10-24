<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class supportProductController extends Controller
{
    public function SingleProduct($slug){
        if($slug){
            $product = Product::all()->where('quantiteStock','>',0)->where('slug',$slug)->first();
            if($product){
                $similar = Product::all()->where('quantiteStock','>',0)->where('category_name',$product->category_name)->take(5);
                return view('singleProduct',compact('product','similar'));
            }
            else{
                return redirect(url('index'));
            }
        }
        else{
            return redirect()->back();
        }

    }
    public function generatePDF($numero)
    {

        $order = Order::where('numero', $numero)->select()->get()->first();
        $OrderDetails = DB::table('order_details')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->where('order_details.order_numero', $numero)
            ->select()
            ->get();
        $rand = rand(5,10);
        $image = public_path('logo/logo2.jpg');
        $namePdf = $order->numero.auth()->user()->name. $rand . '.pdf';
        $pdf = Pdf::loadView('facture.viewPdf', compact('order','OrderDetails','image'));
        return $pdf->download($namePdf);

    }

    public function categoryProduct($cat, Request $request)
    {
        if(session('product')){
            $productName = session('product');
            $query = Product::where('category_name', $cat)->where('nameProduct','like',"%$productName%")->where('quantiteStock','>',0)->select(['nameProduct', 'id', 'prix', 'image', 'slug']);
        }
        else{
            $query = Product::where('category_name', $cat)->where('quantiteStock','>',0)->select(['nameProduct', 'id', 'prix', 'image', 'slug']);
        }
        if ($request->filled('opt')) {
            $query->orderBy('prix', $request->input('opt'));
        }

        if ($request->filled('min') && $request->filled('max')) {
            $query->whereBetween('prix', [$request->input('min'), $request->input('max')]);
        }

        $products = $query->paginate(8)->appends($request->except('page'));
        $count = $products->total();

        return view('allProduct', compact('products', 'count', 'cat'));
    }

    public function ordersForUser(){
        $orders = Order::where('user_id',auth()->user()->id)->with('products')->paginate(8);

        return view('profile.partials.order',compact('orders'));
    }
    public function cancledOrdersForUser(){
        $ordersCanceled = DB::table('canceled_orders')->where('user_id',auth()->user()->id)->paginate(8);
        return view('profile.partials.canceledOrder',compact('ordersCanceled'));

    }
}
