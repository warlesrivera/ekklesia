<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Attachment extends Model
{


    public static function image($id, $img_tmp, $folder, $name = null, $sizes = ['sm', 'md', 'lg'], $optimize = 75)
    {


        try {
            $nombreArchivo = '';
            if (!isset($name)) {

                $nombreArchivo = $img_tmp->getClientOriginalName();
                if ($folder == 'linkCobro') {
                    $nombreArchivo = $folder . "-" . uniqid() . '.' . $img_tmp->getClientOriginalExtension();
                    $folder = 'imagenes';
                } else {
                    $nombreArchivo = "logo-" . uniqid() . '.' . $img_tmp->getClientOriginalExtension();
                }
            } else {
                $nombreArchivo = $name;
            }

            $format = $img_tmp->getClientOriginalExtension();
            //verify file
            if (!is_string($img_tmp)) {
                $img_tmp = $img_tmp->getRealPath();
            }
            // resize small
            if ((is_array($sizes) && in_array("sm", $sizes)) || $sizes == "sm") {
                //Set directory to image
                $path = '/' . $id . '/' . config('filesconfig.' . $folder . '.sm_dir');
                $width = config('filesconfig.' . $folder . '.sm_width');
                $height = config('filesconfig.' . $folder . '.sm_height');
                // save image
                Attachment::saveImage($nombreArchivo, $img_tmp, $folder, $path, $width, $height, $format, $optimize);
            }

            // resize medium
            if ((is_array($sizes) && in_array("md", $sizes)) || $sizes == "md") {
                // //Set directory to image
                $path = '/' . $id . '/' . config('filesconfig.' . $folder . '.md_dir');
                $width = config('filesconfig.' . $folder . '.md_width');
                $height = config('filesconfig.' . $folder . '.md_height');
                // save image
                Attachment::saveImage($nombreArchivo, $img_tmp, $folder, $path, $width, $height,  $format, $optimize);
            }

            // resize large
            if ((is_array($sizes) && in_array("lg", $sizes)) || $sizes == "lg") {
                // //Set directory to image
                $path = '/' . $id . '/' . config('filesconfig.' . $folder . '.lg_dir');
                $width = config('filesconfig.' . $folder . '.lg_width');
                $height = config('filesconfig.' . $folder . '.lg_height');
                // save image
                Attachment::saveImage($nombreArchivo, $img_tmp, $folder, $path, $width, $height, $format, $optimize);
            }
            // resize custom size
            if (is_array($sizes) && isset($sizes['width']) && isset($sizes['height'])) {
                // //Set directory to image
                $path = '/' . $id . '/' . config('filesconfig.' . $folder . '.lg_dir');
                $width = $sizes['width'];
                $height = $sizes['height'];

                // save image
                Attachment::saveImage($nombreArchivo, $img_tmp, $folder, $path, $width, $height, $format, $optimize);
            }

            //return new image name in server
            return $nombreArchivo;
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
        }
    }

    private static function saveImage($imageName, $img_tmp, $folder, $path, $width, $height, $format, $optimize = 75)
    {

        $img                                                                                                                                                                                                                                                                                                                                                                                                    = \Image::cache(function ($image) use ($width, $height, $img_tmp, $folder, $format, $optimize) {
            $image->make($img_tmp)->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                //$constraint->upsize();
            });
            if (strlen($width) > 0 && strlen($height) > 0) {
                $image->crop($width, $height);
            }

            $image->encode($format, $optimize);
            $image->interlace(true);
            $image->trim('transparent', array('top', 'bottom'));
        }, 10, true);
        // save image in server
        \Storage::disk(config('constants.STORAGE'))->put($path . $imageName, $img, 'public');
        // chown(public_path().$path.$imageName, get_current_user());
    }

    public static function imageDelete($id, $img_tmp, $folder, $sizes = ['sm', 'md', 'lg'])
    {
        try {
            /**
             * Delete image from server
             */
            // Delete small
            if ((is_array($sizes) && in_array("sm", $sizes)) || $sizes == "sm") {
                //Set directory to image
                $dir = '/' . $id . config('filesconfig.' . $folder . '.sm_dir');


                // Delete image in server
                \Storage::disk(config('constants.STORAGE'))->delete($dir . $img_tmp);
            }

            // Delete medium
            if ((is_array($sizes) && in_array("md", $sizes)) || $sizes == "md") {
                //Set directory to image
                $dir = '/' . $id . config('filesconfig.' . $folder . '.md_dir');

                // Delete image in server
                \Storage::disk(config('constants.STORAGE'))->delete($dir . $img_tmp);
            }

            // Delete medium
            if ((is_array($sizes) && in_array("lg", $sizes)) || $sizes == "lg") {
                //Set directory to image
                $dir = '/' . $id . config('filesconfig.' . $folder . '.lg_dir');
                // Delete image in server
                \Storage::disk(config('constants.STORAGE'))->delete($dir . $img_tmp);
            }

            //return boolean
            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
        }
    }

    public static function imageToPdf($img_tmp, $folder)
    {
        $ext = $img_tmp->getClientOriginalExtension();
        $orName = $img_tmp->getClientOriginalName();
        $fileName = htmlentities(urlencode(uniqid(str_slug(time(), '_')))) . '.pdf';

        $path = \Storage::disk(config('constants.STORAGE'))->getAdapter()->getPathPrefix() . config('filesconfig.' . $folder . '.pu_dir') . $fileName;

        $image = base64_encode(file_get_contents($img_tmp->path()));
        $dompdf = \PDF::loadHTML('<table border="0" align="center"><tr><td height="950px" widht="600px" valing="middle" align="center"><img src="data:imag/' . $ext . ';base64, ' . $image . '" widht="100%" style="height: auto; max-height:950px; max-widht: 600px"></td></tr></table>')
            ->setPaper('Letter', 'Portrait')
            ->save($path);
        return $fileName;
    }

    public static function file($id, $file_tmp, $element, $name = null)
    {
        try {
            /**
             * Rename file
             */

            $nombreArchivo = '';
            if (!isset($name)) {

                $certificadocuenta_name = $file_tmp->getClientOriginalName();
                $nombreArchivo = $element . "-" . uniqid() . '.' . $file_tmp->getClientOriginalExtension();
            } else {
                $nombreArchivo = explode('/', $name);
                $nombreArchivo = end($nombreArchivo);
            }

            $dirfile = $id . '/documentos/';
            /**
             * save file in server
             */
            \Storage::disk(config('constants.STORAGE'))->putFileAs($dirfile, $file_tmp, $nombreArchivo);

            return $dirfile . $nombreArchivo;
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
        }
    }

    public static function fileDelete($file_tmp, $folder)
    {
        try {
            $dirfile = config('filesconfig.' . $folder . '.pu_dir');
            /**
             * Delete file in server
             */
            \Storage::disk(config('constants.STORAGE'))->delete($dirfile . $file_tmp);

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
        }
    }
}
