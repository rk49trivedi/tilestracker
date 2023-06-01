<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Models\TilesImage;

class CategoryController extends Controller
{
    public function category(){
        $allCategory = Category::all();

        
        if(isset($_REQUEST['categoryid'])){
            $checkcat = Category::find($_REQUEST['categoryid']);
            if($checkcat){
                $catName = str_replace(' ', '_', strtolower($checkcat->name));
                $path = public_path('img/tiles/'.$catName);
                
                if (File::exists($path)) {
                    File::deleteDirectory($path);
                }
                $delCategory = Category::find($_REQUEST['categoryid'])->delete();
                if(TilesImage::where('cat_id',$_REQUEST['categoryid'])){
                    $delimages = TilesImage::where('cat_id',$_REQUEST['categoryid'])->delete();
                    
                }
            }
            
            return redirect()->back()->with('success','Category Successfully deleted');
        }

        return view('admin/category/manage_category',compact('allCategory'));
    }
    
    public function createCategory(){
        return view('admin/category/create_category');
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('admin/category/edit_category',compact('category'));
    }

    public function updateCategory(Request $request){

        if(Category::where('name',$request->catName)->where('id','<>',$request->hidid)->first()){
            return redirect()->back()->with('error','Category already exist');
        }
        $saveCat = Category::find($request->hidid);
        $saveCat->display_name = $request->catName;
        $saveCat->save();

       return redirect()->back()->with('success','Category Successfully saved');

    }

    public function addCategory(Request $request){

        if(Category::where('name',$request->catName)->first()){
            return redirect()->back()->with('error','Category already exist');
        }
        $saveCat = new Category();
        $saveCat->name = $request->catName;
        $saveCat->display_name = $request->catName;
        $saveCat->save();

       return redirect()->back()->with('success','Category Successfully saved');

    }
    
}
