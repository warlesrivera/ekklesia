<?php
use App\Models\Attachment;

if(! function_exists('saveImages')){

    function saveImages($folder,$request):?array
    {
        if ($request->file('images')) {
            $imagenArray = [];
            //save image
            foreach ($request->file('images') as $key => $img_tmp) {
                array_push($imagenArray, Attachment::image($img_tmp,$folder));
            }
            return $imagenArray;
        }
        return null;

    }
}

if(! function_exists('deleteImages')){

    function deleteImages($arrayImg,$folder,$listImage){

        $imageGalery=[];
        foreach ($listImage as $img) {

            if (!in_array($img, $arrayImg)) {
                Attachment::imageDelete($img,$folder);
            } else {
                array_push($imageGalery, $img);
            }
        }
        return $imageGalery;
    }
}

if(! function_exists('deleteImage')){

    function deleteImage($folder,$images){
        foreach($images as $item){
            return Attachment::imageDelete($item,$folder);
        }
    }
}



