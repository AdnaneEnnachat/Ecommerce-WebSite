<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    public function index(){
        $cat = Categorie::all();
        return view('Admin.category')->with(['category'=>$cat]);;
    }


    public function save(Request $req){
        $req->validate([
            'name'=>['required','string','min:3','max:20'],
        ],
            ['name.required'=>'The category most be required']);
        $category = new Categorie();
        DB::beginTransaction();
        try {
            $category->Create(['name'=>$req->name]);
            DB::commit();
            return back()->with(['status'=>'Added']);
        }
        catch (Exception $e){
            DB::rollBack();
            return back()->with(['status'=>'Error']);
        }


    }
    public function delete($name){
        $cat = Categorie::where('name',$name)->get()->first();
        Categorie::where('name',$name)->delete();
        return response()->json(['message'=>true,'cat'=> $cat ]);
    }
    public function edit($name){
        $category = Categorie::where('name',$name)->get()->first();
        return response()->json(['message'=>true,'category'=> $category ]);
    }
    public function update(Request $req){
        $req->validate([
            'oldName'=>['required','string'],
            'name'=>['required','string','min:3','max:20'],
        ],
            ['name.required'=>'The category most be required']);
        DB::beginTransaction();
        try {
            Categorie::where('name',$req->oldName)->update(['name'=>$req->name]);
            DB::commit();
            return response()->json(['message'=>true]);
        }
        catch (Exception $e){
            DB::rollBack();
            return response()->json(['message'=>false,'error'=>$e]);
        }
    }
}
