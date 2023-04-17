<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TilesImage;
use Exception;
use File;

class ImagesController extends Controller
{
    public function uploadTiles($catid){
        $category = Category::find($catid);
        return view('admin/tiles/upload',compact('category'));
    }

    public function searchImages(Request $request){

        try{

        }catch(Exception $e){
            return redirect()->back()->with('error','Please upload image to search');
            exit;
        }
       

        $allMatchesImages = array();
        

        if($request->hasFile('searchimagefile')){

            $file = $request->file('searchimagefile');
            $fullpathToCompare = '';

            $randomdate = strtotime(date('Y-m-d H:i'));
            $randomfile = 'TilesLover_'.$randomdate.rand(000,9999);
            $extname = strtolower($file->getClientOriginalExtension());
            $file->storeAs('img/tiles/compare/',$randomfile.'.'.$extname);
            $docfilename = $randomfile.'.'.$extname;
            $fullpathToCompare = url('img/tiles/compare/'.$docfilename);
            $path_removal = $_SERVER['DOCUMENT_ROOT'].'/img/tiles/compare/'.$docfilename;

            if($fullpathToCompare != ''){
                $imageOne =  $fullpathToCompare;

                if($request->category_name && $request->category_name != ''){
                    $catName = str_replace('_',' ',ucfirst($request->category_name));
                    $currentCat = $request->category_name;
                    $allCatImages = Category::join('images','images.cat_id','=','category.id')->where('category.name',$catName)->get();
                }else{
                    $allCatImages = Category::join('images','images.cat_id','=','category.id')->get();
                    $currentCat = '';
                }

                foreach($allCatImages as $catDetails){
                    $catName = str_replace(' ','_',strtolower($catDetails->name));
                    $path = $_SERVER['DOCUMENT_ROOT'].'img/tiles/'.$catName;
                    if (!file_exists($path)) {
                        $images = [];
                        $files = File::files(public_path('img/tiles/'.$catName));
                        foreach($files as $file){
                            $imageName = $file->getRelativePathname();
                            $imagetwo = url('img/tiles/'.$catName.'/'.$imageName);

                            if(exif_imagetype($imageOne) != IMAGETYPE_JPEG || exif_imagetype($imagetwo) != IMAGETYPE_JPEG){
                                
                                return redirect()->back()->with('error','Use only JPEG images');
                                exit;
                               
                            }

                            $similarityRate = TilesImage::compareImages($imageOne,$imagetwo);
                            
                            if($similarityRate >= 25 && $similarityRate <= 100){
                                $res['imagePath'] = $imagetwo;
                                $res['title'] = $imageName;
                                $res['category'] = $catDetails->name;
                                array_push($allMatchesImages,$res);
                            }
                        }
                    }
                    
                }
            }

            if(file_exists($path_removal)) {
                unlink($path_removal);
            }


            $categories = Category::orderBy('name','asc')->get();
            
            return view('searchimg',compact('allMatchesImages','categories','currentCat'));
            exit;

        }else if($request->category_name && $request->category_name != ''){
           
            $catName = str_replace('_',' ',ucfirst($request->category_name));
            $allCatImages = Category::join('images','images.cat_id','=','category.id')->where('category.name',$catName)->get();
           
            
            foreach($allCatImages as $catDetails){
                $catName = str_replace(' ','_',strtolower($catDetails->name));
                
                $files = json_decode($catDetails->stock);
                
                foreach($files as $file){
                    $imageName = $file;
                    $imagetwo = url('img/tiles/'.$catName.'/'.$imageName);
                    $res['imagePath'] = $imagetwo;
                    $res['title'] = $imageName;
                    $res['category'] = $catDetails->name;
                    array_push($allMatchesImages,$res);
                }
                
            }

            $categories = Category::orderBy('name','asc')->get();
            $currentCat = $request->category_name;
            
            return view('searchimg',compact('allMatchesImages','categories','currentCat'));
            exit;
        
        }else{
            return redirect()->back()->with('error','Please upload image to search');
            exit;
        }

    }

    // public function searchImages(Request $request){

    //     $allMatchesImages = array();

    //     if($request->hasFile('searchimagefile')){

    //         $file = $request->file('searchimagefile');
    //         $fullpathToCompare = '';

    //         $randomdate = strtotime(date('Y-m-d H:i'));
    //         $randomfile = 'TilesLover_'.$randomdate.rand(000,9999);
    //         $extname = strtolower($file->getClientOriginalExtension());
    //         $file->storeAs('img/tiles/compare/',$randomfile.'.'.$extname);
    //         $docfilename = $randomfile.'.'.$extname;
    //         $fullpathToCompare = url('img/tiles/compare/'.$docfilename);
    //         $path_removal = $_SERVER['DOCUMENT_ROOT'].'/img/tiles/compare/'.$docfilename;

    //         if($fullpathToCompare != ''){
    //             $imageOne =  $fullpathToCompare;
    //             $allCatImages = Category::join('images','images.cat_id','=','category.id')->get();
    //             foreach($allCatImages as $catDetails){
    //                 $catName = str_replace(' ','_',strtolower($catDetails->name));
    //                 $path = $_SERVER['DOCUMENT_ROOT'].'img/tiles/'.$catName;
    //                 if (!file_exists($path)) {
    //                     $images = [];
    //                     $files = File::files(public_path('img/tiles/'.$catName));
    //                     foreach($files as $file){
    //                         $imageName = $file->getRelativePathname();
    //                         $imagetwo = url('img/tiles/'.$catName.'/'.$imageName);
    //                         $similarityRate = TilesImage::compareImages($imageOne,$imagetwo);
    //                         if($similarityRate >= 25 && $similarityRate <= 100){
    //                             $res['imagePath'] = $imagetwo;
    //                             $res['title'] = $imageName;
    //                             $res['category'] = $catDetails->name;
    //                             array_push($allMatchesImages,$res);
    //                         }
    //                     }
    //                 }
                    
    //             }
    //         }

    //         if(file_exists($path_removal)) {
    //             unlink($path_removal);
    //         }
            
    //         echo json_encode(
    //             array("status"=>true,
    //             "message"=>"success",
    //             "allMatchedFiles"=>$allMatchesImages
    //             )
    //         );
    //         exit;

    //     }else{
    //         echo json_encode(array('status'=>false,'message'=>'Please upload image to search'));
    //         exit;
    //     }

    // }

    public function addTiles(Request $request){

        $files = $request->file('uploadfile');
        $category = Category::find($request->hidid);
        $tilesName = str_replace(' ','_',strtolower($category->name));

        $blankarray_images = array();
        foreach ($files as $file) {
            $randomdate = strtotime(date('Y-m-d H:i'));
            $randomfile = 'TilesLover_'.$randomdate.rand(000,9999);
            $extname = strtolower($file->getClientOriginalExtension());
            $file->storeAs('img/tiles/'.$tilesName,$randomfile.'.'.$extname);
            $docfilename = $randomfile.'.'.$extname;
            array_push($blankarray_images, $docfilename);
        }

        $checkQury = TilesImage::where('cat_id',$request->hidid)->first();
        if($checkQury){

            $oldImages = json_decode($checkQury->stock,true);
            $blankarray_images = array_merge($oldImages,$blankarray_images);
            $saveImages = TilesImage::find($checkQury->id);
        }else{
            $saveImages = new TilesImage();
        }

        
        $saveImages->cat_id = $request->hidid;
        $saveImages->stock = json_encode($blankarray_images,true);
        $saveImages->save();
        return redirect()->back()->with('success','Images Successfully saved');



    }

    public function viewTiles($catid){

        if(isset($_REQUEST['fileId']) && isset($_REQUEST['filename'])){
            $savedFile = TilesImage::join('category','category.id','=','images.cat_id')->where('images.id',$_REQUEST['fileId'])->select('category.name','images.*')->first();
            $tileCatname = str_replace(' ','_',strtolower($savedFile->name));
            $arrayData = json_decode($savedFile->stock,true);
            if (($key = array_search($_REQUEST['filename'], $arrayData)) !== false) {

                if(file_exists($_SERVER['DOCUMENT_ROOT'].'/img/tiles/'.$tileCatname.'/'.$_REQUEST['filename'])) {
                    unlink($_SERVER['DOCUMENT_ROOT'].'/img/tiles/'.$tileCatname.'/'.$_REQUEST['filename']);
                }
                unset($arrayData[$key]);
                $updateImages = json_encode($arrayData,true);
                $saveImages = TilesImage::find($savedFile->id);
                $saveImages->stock = $updateImages;
                $saveImages->save();
                return redirect()->back()->with('success','Image Successfully deleted');

            }
        }

        $allTiles = TilesImage::join('category','category.id','=','images.cat_id')->where('images.cat_id',$catid)->select('category.name','images.*')->first();
        return view('admin/tiles/view',compact('allTiles'));

    }



}
