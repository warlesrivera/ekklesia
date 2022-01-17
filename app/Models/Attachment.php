<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;

class Attachment extends Model
{
    public const DK_PUBLIC = 'public';
    public const DK_PRIVATE = 'local';
    public static function image($img_tmp,$folder,$name='', $format='png',$optimize=100,$disk = Attachment::DK_PUBLIC)
    {

      try
      {

        if($folder=='temp'){
            $width = config('filesconfig.'.$folder.'.width');
            $height = config('filesconfig.'.$folder.'.height');
        }else{
            list($width,$height) = getimagesize($img_tmp);
        }
        /**
        * Save image in server
        */

        if($name!=''){
          $imageName = $name.'.'.$format;
        }else{
          $imageName =  htmlentities(urlencode(uniqid(time()))).'.'.$format;

        }

        //verify file
        $dir = config('filesconfig.'.$folder.'.dir');
        if($folder!='ckeditorImage')
            $dir .= Auth::id().'/';


        // //Set directory to image

       if( $format=='gif'){

        $img=\Storage::disk($disk)->put($dir.$imageName ,file_get_contents($img_tmp) );

       }else{
        if (!is_string($img_tmp)) {
          $img_tmp = $img_tmp->getRealPath();
      }
         $img = \Image::cache(function($image)use($width, $height, $img_tmp,$folder,$format,$optimize) {
           $image->make($img_tmp)->fit($width, $height, function ($constraint) {
             $constraint->upsize();
         });

           if (strlen($width)>0 && strlen($height)>0) {
             $image->crop($width, $height);
           }

           $image->encode($format, $optimize);
           $image->interlace(true);
         }, 10, true);

         \Storage::disk($disk)->put($dir.$imageName, $img, 'public');

       }

        return $imageName;
      } catch (Exception $e) {
        Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
      }
    }

        public static function imagePerzonalized($img_tmp,$folder,$name='', $format='jpg',$optimize=100,$disk = Attachment::DK_PUBLIC,$section=null)
    {

      try
      {
        if($section==null ){

			    $width = config('filesconfig.'.$folder.'.width');
			    $height = config('filesconfig.'.$folder.'.height');
        }else{
			    $width = config('filesconfig.'.$folder.'.width_cr');
			    $height = config('filesconfig.'.$folder.'.height_cr');
        }
        /**
        * Save image in server
        */
        //Rename image
        $imageName =null;
        if($name!=''){
          $imageName = $name.htmlentities(urlencode(uniqid(str_slug(time(),'_')))).'.'.$format;
        }else{
          $imageName =  htmlentities(urlencode(uniqid(str_slug(time(),'_')))).'.'.$format;

        }
        //verify file
        if (!is_string($img_tmp)) {
            $img_tmp = $img_tmp->getRealPath();
        }

        // //Set directory to image
        $dir = config('filesconfig.'.$folder.'.dir');
        $img = \Image::cache(function($image)use($width, $height, $img_tmp,$folder,$format,$optimize) {
	        $image->make($img_tmp)->resize($width, $height, function ($constraint) {
	            $constraint->aspectRatio();

	        });

	        $image->encode($format, $optimize);
	        $image->interlace(true);
	    }, 10, true);

        \Storage::disk($disk)->put($dir.$imageName, $img, 'public');

        return $imageName;
      } catch (Exception $e) {
        Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
      }
    }


    public static function imageDelete($img_tmp,$folder){
      try
      {
        /**
        * Delete image from server
        */
        // Delete small
        //Set directory to image
        $dir = config('filesconfig.'.$folder.'.dir');
        // Delete image in server
        \Storage::disk('public')->delete($dir.$img_tmp);

        //return boolean
        return true;
      } catch (Exception $e) {
        Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
      }
    }

    public static function file($file_tmp,$folder)
    {
    	try {
            $dirfile = config('filesconfig.'.$folder.'.pu_dir');
            /**
             * Rename file
             */
            $fileName = htmlentities(urlencode(uniqid(str_slug(time(),'_')))).'.'.$file_tmp->getClientOriginalExtension();
            /**
             * save file in server
             */
            \Storage::disk('public')->putFileAs($dirfile, $file_tmp, $fileName);

            return $fileName;
    	} catch (Exception $e) {
    		Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
    	}
    }

    public static function fileDelete($file_tmp,$folder)
    {
    	try {
            $dirfile = config('filesconfig.'.$folder.'.pu_dir');
            /**
             * Delete file in server
             */
            \Storage::disk('public')->delete($dirfile.$file_tmp);

            return true;
    	} catch (Exception $e) {
    		Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
    	}
    }
}
