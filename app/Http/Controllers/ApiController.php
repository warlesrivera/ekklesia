<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;

/**
 * Clase ApiController encargada de tener los metodos de respuesta y los genericos
 *
 * @author  Sergio Benavides, Ubarles Rivera
 */
class ApiController extends Controller
{
    use ApiResponser;


    public function setFileEditor(Request $request){

        if ($request->type=='images') {
			// // read image from temporary file
            $img_tmp = $request->file('upload');
            /**
             * save image in server
             */

                $dir = config('filesconfig.'.$request->folder.'dir');
                $fileExtension = $img_tmp->getClientOriginalExtension();
                $size = getimagesize($img_tmp);
                $image = \App\Attachment::image($img_tmp, $request->folder, ['width'=>$size[0], 'height'=>$size[1]], false, $fileExtension, 80);

            if ($image) {
                if (isset($request->CKEditor) && $request->CKEditor=='content') {
                    $content = "<script type=\"text/javascript\">\n";
                    $content .= "window.parent.CKEDITOR.tools.callFunction(" . $request->CKEditorFuncNum . ", '" . Storage::url($dir.$image) . "', '');\n";
                    $content .= "</script>";
                    echo $content;
                }else{
                    return response()->json(['uploaded'=>true,'url'=>Storage::url($dir.$image)]);
                }
            }else{
                return response()->json(['uploaded'=>false,'url'=>null]);

            }
		}
    }
}
