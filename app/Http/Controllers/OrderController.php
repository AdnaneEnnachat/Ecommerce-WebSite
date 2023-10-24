<?php

namespace App\Http\Controllers;

use App\Mail\factureMail;
use App\Models\Order;
use App\Models\product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function makeOrder(Request $data)
    {
        $numCommande = str::random(10);
        $Order = new Order;
        DB::beginTransaction();

        // Validate the request data
        $validatedData = $data->validate([
            'name' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'phone' => 'required',
            'total' => 'required',
            'dataPanier' => 'required|array',
            'dataPanier.*.id' => 'required',
            'dataPanier.*.quantity' => 'required',
            'dataPanier.*.prix' => 'required',
        ]);

        try {

            $orderData =  $Order->create([
                'numero' => $numCommande,
                'user_id' => auth()->user()->id,
                'email' => auth()->user()->email,
                'fullName' => htmlspecialchars($validatedData['name']),
                'adresse' => htmlspecialchars($validatedData['adresse']),
                'ville' => htmlspecialchars($validatedData['ville']),
                'phone' => htmlspecialchars($validatedData['phone']),
                'total' => $validatedData['total'],
                'oder_date'=>now()
            ]);

            if ($orderData) {
                foreach ($validatedData['dataPanier'] as $item) {
                    $CheckInsr =  DB::table('order_details')->insert([
                        'order_numero' => $numCommande,
                        'product_id' => $item['id'],
                        'quantite' => $item['quantity'],
                        'price' => $item['prix']
                    ]);
                }

                if ($CheckInsr) {
                    try {
                        $mailOrder = Order::where('numero', $numCommande)->select()->get()->first();
                        $mailOrderDetails = DB::table('order_details')
                            ->join('products', 'products.id', '=', 'order_details.product_id')
                            ->where('order_details.order_numero', $numCommande)
                            ->select()
                            ->get();
                        Mail::to(auth()->user()->email)->send(new factureMail($mailOrder, $mailOrderDetails));
                    } catch (Exception $e) {
                        return $e;
                    }
                }
            }

            DB::commit();
            return response()->json(['message' => 'success']);
        } catch (Exception $e) {
            DB::rollBack();
            echo $e;
            return response()->json(['message' => 'error', 'error' => $e]);
        }
    }




    public function OrdersAdmin(Request $req){
            if($req->status){
                if($req->status != 'canceled'){
                    $data = Order::where('status',$req->status)->with('products')->paginate(10);
                    return view('Admin.orders')->with(['orders'=>$data]);
                }
                else{
                    $data = DB::select('CALL get_deleted_orders()');
                    return view('Admin.orders')->with(['DeletedOrders'=>$data]);
                }

            }
            elseif($req->order_num){
                $data = Order::where('numero','like',"%$req->order_num%")->orderBy('oder_date','DESC')->with('products')->paginate(5);
                return view('Admin.orders')->with(['orders'=>$data]);
            }


        $data = Order::orderBy('oder_date','DESC')->with('products')->paginate(10);


        return view('Admin.orders')->with(['orders'=>$data]);
    }
    public function singleOrder($numero){


        $order = Order::where('numero',$numero)->select()->join('order_details','orders.numero', '=', 'order_details.order_numero')->orderBy('oder_date','DESC')->first();
            $product = Order::where('numero',$numero)->join('order_details','orders.numero', '=', 'order_details.order_numero')->join('products','products.id', '=', 'order_details.product_id')->select(['image','nameProduct'])->get();


        return response()->json(['message'=>true,'order'=>$order,'product'=>$product]);
    }

    public function StatusUpdate(Request $req){
        $req->validate([
           'orderNumero'=>'required',
            'status'=>'required'
        ]);
        if($req->status == 'canceled'){
            Order::where('numero',$req->orderNumero)->delete();
            return response()->json(['message'=>true]);
        }
        if($req->status == 'pending' or $req->status == 'confirmed' or $req->filled('status') == 'delivered'){
            Order::where('numero',$req->orderNumero)->update(['status'=>$req->status]);
            return response()->json(['message'=>true]);
        }
        return response()->json(['message'=>false]);
    }
}
