<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PHPUnit\Exception;


class ProductController extends Controller
{
        public function add_to_panier(Request $req){
            $data = product::find($req->id);
            return  response()->json(['success'=>true,'data'=>$data]);
        }


        public function Send_data(){
        $PC_Data = product::where('category_name','PC GAMER')->where('quantiteStock','>',0)->offset(0)->limit(10)->get();
        $GPU_Data = product::where('category_name','GRAPHIC CARD')->where('quantiteStock','>',0)->offset(0)->limit(10)->get();
        $LAPTOP_Data = product::where('category_name','LAPTOP')->where('quantiteStock','>',0)->offset(0)->limit(10)->get();
        return view('index',compact('PC_Data','GPU_Data','LAPTOP_Data'));
    }
    public function getProduct(){
       $data =  product::All();
        return response()->json(['message'=>true,'data'=>$data]);
    }
    public function addProduit(ProductRequest $request)
    {
        $name = htmlspecialchars($request->input('name'));
        $prix = $request->input('prix');
        $category = htmlspecialchars($request->input('category'));
        $quantite = htmlspecialchars($request->input('quantite'));
        $description = $request->input('description');
        $slug = Str::slug($name.Str::random(10),'-');
        $status = 'En stock';
        if($quantite>0){
            $status = 'En stock';
        }
        else{
            $status = 'En repture de stock';
        }

        $path = 'Admin/products';
        $image = time() . '.' . $request->file('image')->extension();
        $imageName = $path . '/' . time() . '.' . $request->file('image')->extension();
        $imageUploaded = $request->file('image')->move($path, $image);

        DB::beginTransaction();
        try {
            if ($imageUploaded) {

                $product = product::Create([
                    'nameProduct' => $name,
                    'quantiteStock' => $quantite,
                    'category_name' => $category,
                    'prix' => $prix,
                    'description' => $description,
                    'image' => $imageName,
                    'status'=>$status,
                    'slug'=> $slug,
                ]);

                if ($product) {
                    DB::commit();
                    return response()->json(['success' => true, 'name' => $name]);
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => false]);
        }
    }
    public function delete($id){
        DB::beginTransaction();
        try{
            $data =product::whereId($id)->get()->first();
            if($data) {
                product::whereId($id)->delete();
                if(File::exists(public_path($data->image))){
                    File::delete(public_path($data->image));
                }
                DB::commit();
                return response()->json(['message' => true]);
            }
        }
        catch (Exception $e){
            DB::rollBack();
            return response()->json(['message'=>false]);
        }
    }
    public function edit($id){

        DB::beginTransaction();
        try{
            $data = product::whereId($id)->get();
            DB::commit();
            return response()->json(['message'=>true,'productData'=>$data]);
        }
        catch (Exception $e){
            DB::rollBack();
            return response()->json(['message'=>false]);
        }

    }
    public function update(ProductRequest $req)
    {

            $name = htmlspecialchars($req->input('name'));
            $prix = $req->input('prix');
            $category = htmlspecialchars($req->input('category'));
            $quantite = htmlspecialchars($req->input('quantite'));
            $description = $req->input('description');
            $path = 'Admin/products';
            $slug = Str::slug($name.Str::random(10),'-');
            $imageName = $path.'/'.time().'.'.$req->file('image')->extension();
            $image = time() . '.' . $req->file('image')->extension();
            $imageUploaded = $req->file('image')->move($path, $image);
            $delImg = product::whereId($req->id)->get()->first();
        DB::beginTransaction();

        try
        {
            if($imageUploaded) {
                if($quantite<=0){
                    $status = 'En repture de stock';
                    $data = product::where('id', $req->id)->update(['nameProduct' => $name, 'quantiteStock' => $quantite, 'category_name' => $category, 'prix' => $prix, 'description' => $description, 'image' => $imageName, 'updated_at' => date('Y-m-d H:i:s'),'status'=>$status]);
                    if(File::exists(public_path($delImg->image))){
                        File::delete(public_path($delImg->image));
                    }
                }
                else if($quantite>0){
                    $status = 'En stock';
                    $data = product::where('id', $req->id)->update([
                        'nameProduct' => $name, 'quantiteStock' => $quantite,
                        'category_name' => $category, 'prix' => $prix, 'description' => $description,
                        'image' => $imageName, 'updated_at' => date('Y-m-d H:i:s'),
                        'status'=>$status,'slug'=>$slug]);
                    if(File::exists(public_path($delImg->image))){
                        File::delete(public_path($delImg->image));
                    }
                }

                if ($data) {
                    DB::commit();
                    return response()->json(['success' => true, 'data' => $req]);
                }
            }
        }
        catch (Exception $e){
            DB::rollBack();
            return response()->json(['error' => false]);
        }
        }

}
