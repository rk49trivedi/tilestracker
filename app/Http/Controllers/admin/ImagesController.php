<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TilesImage;
use Exception;
use File;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function uploadTiles($catid){
        $category = Category::find($catid);
        return view('admin/tiles/upload',compact('category'));
    }

    public function searchImages(Request $request){


        $limitSearch = 0;

        if(session()->has('unlocker_user')){
            $userId = session()->get('unlocker_user')[0];
            $returnData = TilesImage::checkPlans($userId);
            if($returnData == 1){
                $limitSearch = 1;
            }
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
            $path_removal = '/img/tiles/compare/'.$docfilename;

            if($fullpathToCompare != ''){
                $imageOne =  $fullpathToCompare;

                if($request->category_name && $request->category_name != ''){
                    $catName = str_replace('_',' ',ucfirst($request->category_name));
                    $currentCat = $request->category_name;
                    $allCatImages = Category::join('images','images.cat_id','=','category.id')->where('category.display_name',$catName)->get();
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
                            
                            $realImageNames = '';
                            
                            
                           $catDetailsImag =  TilesImage::find($catDetails->id);
                           if($catDetailsImag){
                               
                               $arrayData = json_decode($catDetailsImag->stock,true);
            
                                $imageSlugToDelete = $imageName;
                                
                               
                    
                                foreach ($arrayData as $key => $item) {
                                    if ($item['image_slug'] === $imageSlugToDelete) {
                                        
                                        $realImageNames = $item['image_title'];
                                        break;
                                    }
                                }
                               
                           }
                            
                            
                            
                            
                            
                            $imagetwo = url('img/tiles/'.$catName.'/'.$imageName);

                            if(exif_imagetype($imageOne) != IMAGETYPE_JPEG || exif_imagetype($imagetwo) != IMAGETYPE_JPEG){
                                
                                return redirect()->back()->with('error','Use only JPEG images');
                                exit;
                               
                            }

                              $similarityRate = TilesImage::compareImages($imageOne,$imagetwo); 
                              

                            if($similarityRate > 0){
                                $similarityRate = round(($similarityRate * 100));
                            }

                            if($similarityRate >= 25 && $similarityRate <= 100){
                                $res['imagePath'] = $imagetwo;
                                $res['imageName'] = $realImageNames;
                                $res['title'] = $imageName;
                                $res['rate_match'] = $similarityRate;
                                $res['category'] = $catDetails->display_name;
                                $res['category_slug'] = $catDetails->name;
                                array_push($allMatchesImages,$res);
                            }else if($similarityRate >= 100 && $similarityRate <= 10000){
                                $res['imagePath'] = $imagetwo;
                                $res['imageName'] = $realImageNames;
                                $res['title'] = $imageName;
                                $res['rate_match'] = $similarityRate;
                                $res['category'] = $catDetails->display_name;
                                $res['category_slug'] = $catDetails->name;
                                array_push($allMatchesImages,$res);
                            }


                        }
                    }
                    
                }
            }
            
            if (Storage::exists($path_removal)) {
                Storage::delete($path_removal);
            }
           


            // Separate the array by rate_match
            $separatedArray = array();
            foreach ($allMatchesImages as $item) {
                $rateMatch = $item['rate_match'];
                $res['imagePath'] = $item['imagePath'];
                $res['imageName'] = $item['imageName'];
                $res['title'] = $item['title'];
                $res['rate_match'] = $item['rate_match'];
                $res['category'] = $item['category'];
                $res['category_slug'] = $item['category_slug'];
                $separatedArray[$rateMatch][] = $res;
                
            }


//             echo '<pre>';
//             print_r($separatedArray);

// // Loop through the separated array and display titles
// foreach ($separatedArray as $rateMatch => $filterImages) {
//     echo "Titles with rate_match $rateMatch:<br>";
//     foreach ($filterImages as $filterImagesinner) {
//         echo $filterImagesinner['title'] . "<br>";
//         echo $filterImagesinner['imagePath'] . "<br>";
//     }
//     echo "<br>";
// }


//             exit;

            

            $categories = Category::orderBy('name','asc')->get();
            
            return view('searchimg',compact('allMatchesImages','categories','currentCat','limitSearch','separatedArray'));
            exit;

        }else if($request->category_name && $request->category_name != ''){
           
            $catName = str_replace('_',' ',ucfirst($request->category_name));
            $allCatImages = Category::join('images','images.cat_id','=','category.id')->where('category.display_name',$catName)->get();
       
            
            foreach($allCatImages as $catDetails){
                $catName = str_replace(' ','_',strtolower($catDetails->name));
                
                $files = json_decode($catDetails->stock,true);
                
                foreach($files as $file){
                    $imageName = $file['image_slug'];
                    $imageName1 = $file['image_title'];
                    $imagetwo = url('img/tiles/'.$catName.'/'.$imageName);
                    $res['imagePath'] = $imagetwo;
                    $res['imageName'] = $imageName1;
                    $res['title'] = $imageName;
                    $res['category_slug'] = $catDetails->name;
                    $res['category'] = $catDetails->display_name;
                    $res['rate_match'] = 100;
                    array_push($allMatchesImages,$res);
                }
                
            }

            $categories = Category::orderBy('name','asc')->get();
            $currentCat = $request->category_name;
            
            return view('searchimg',compact('allMatchesImages','categories','currentCat','limitSearch'));
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
            $res['image_title'] = $request->img_name;
            $res['image_slug'] = $docfilename;
            array_push($blankarray_images, $res);
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
            $savedFile = TilesImage::join('category','category.id','=','images.cat_id')->where('images.id',$_REQUEST['fileId'])->select('category.name','category.display_name','images.*')->first();
            $tileCatname = str_replace(' ','_',strtolower($savedFile->name));
            $arrayData = json_decode($savedFile->stock,true);
            
            $imageSlugToDelete = $_REQUEST['filename'];

            foreach ($arrayData as $key => $item) {
                if ($item['image_slug'] === $imageSlugToDelete) {
                    
                    $imagePath = 'img/tiles/'.$tileCatname.'/'.$item['image_slug'];
                    if (Storage::exists($imagePath)) {
                        Storage::delete($imagePath);
                    }
                    unset($arrayData[$key]);
                    break; // Exit the loop after deleting the first occurrence
                }
            }
            
            $updateImages = json_encode($arrayData,true);
            $saveImages = TilesImage::find($savedFile->id);
            $saveImages->stock = $updateImages;
            $saveImages->save();
            return redirect()->back()->with('success','Image Successfully deleted');
        }

        $allTiles = TilesImage::join('category','category.id','=','images.cat_id')->where('images.cat_id',$catid)->select('category.name','category.display_name','images.*')->first();
        
        return view('admin/tiles/view',compact('allTiles'));

    }



}
