<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TilesImage extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $incrementing = true;
    protected $fillable = 
    [
        'cat_id',
        'stock'
    ];

    public static function checkPlans($userid){
        $checkPlans = DB::table('orders')->where('user_id',$userid)->where('status','completed')->first();
        if($checkPlans){
            return 1;
        }else{
            return 0;
        }
    }

    public static function checkPlanEnd(){

        $currentDate = Carbon::now();
        DB::table('orders')->where('status','completed')->whereDate('end_date', '<', $currentDate)->update(['status'=>'end']);

    }
    


    public static function compareImages($pathA, $pathB)
    {
        $accuracy = 90; //Set accuracy of comparison
        $bim = imagecreatefromjpeg($pathA);  //load base image from internet
        //create comparison points
        $bimX = imagesx($bim);
        $bimY = imagesy($bim);
        $pointsX = $accuracy * 5;
        $pointsY = $accuracy * 5;
        $sizeX = round($bimX / $pointsX);
        $sizeY = round($bimY / $pointsY);
        $im = imagecreatefromjpeg($pathB); //load second image from internet
        //loop through each point and compare the color of that point
        $y = 0;
        $matchcount = 0;
        $num = 0;
        for ($i = 0; $i <= $pointsY; $i++) {
            $x = 0;
            for ($n = 0; $n <= $pointsX; $n++) {
                $x = $n * $sizeX;
                $y = $i * $sizeY;
                if ($x >= $bimX || $y >= $bimY) {
                    continue;
                }
                try {
                    //check if the coordinates are within the bounds of the image
                    if ($x >= 0 && $y >= 0 && $x < imagesx($im) && $y < imagesy($im)) {
                        $rgba = imagecolorat($bim, $x, $y);
                        $colorsa = imagecolorsforindex($bim, $rgba);
                        $rgbb = imagecolorat($im, $x, $y);
                        $colorsb = imagecolorsforindex($im, $rgbb);
                        if (self::colorComp($colorsa['red'], $colorsb['red']) && self::colorComp($colorsa['green'], $colorsb['green']) && self::colorComp($colorsa['blue'], $colorsb['blue'])) {
                            $matchcount++;
                        }
                    }
                    $x += $sizeX;
                    $num++;
                } catch (Exception $e) {
                    //handle exceptions
                }
            }
            $y += $sizeY;
        }
        $rating = $matchcount * (100 / $num);
        return $rating;
    }


    /*public static function compareImages($pathA, $pathB)
    {
        
        $accuracy = 90; //Set accuracy of comparison
        $bim = imagecreatefromjpeg($pathA);  //load base image from internet
        //create comparison points
        $bimX = imagesx($bim);
        $bimY = imagesy($bim);
        $pointsX = $accuracy * 5;
        $pointsY = $accuracy * 5;
        $sizeX = round($bimX / $pointsX);
        $sizeY = round($bimY / $pointsY);
        $im = imagecreatefromjpeg($pathB); //load second image from internet
        //loop through each point and compare the color of that point
        $y = 0;
        $matchcount = 0;
        
        $num = 0;
        for ($i = 0; $i <= $pointsY; $i++) {
            $x = 0;
            for ($n = 0; $n <= $pointsX; $n++) {

                $x = $n * $sizeX;
                $y = $i * $sizeY;
                if ($x >= $bimX || $y >= $bimY) {
                    continue;
                }

                $rgba = imagecolorat($bim, $x, $y);
                $colorsa = imagecolorsforindex($bim, $rgba);
                $rgbb = imagecolorat($im, $x, $y);
                $colorsb = imagecolorsforindex($im, $rgbb);
                if (self::colorComp($colorsa['red'], $colorsb['red']) && self::colorComp($colorsa['green'], $colorsb['green']) && self::colorComp($colorsa['blue'], $colorsb['blue'])) {
                    $matchcount++;
                }

                $x += $sizeX;
                $num++;
            }
            $y += $sizeY;
        }
        $rating = $matchcount * (100 / $num);
        return $rating;
    }*/

    public static function colorComp($color, $c)
    {
        if ($color >= $c - 2 && $color <= $c + 2) {
            return true;
        } else {
            return false;
        }
    }
            



}
