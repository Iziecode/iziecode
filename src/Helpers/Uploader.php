<?php
namespace Iziedev\Iziecode\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;
use File;

class Uploader 
{
    public $disk;

    public function __construct()
    {
        $this->disk = env('FILESYSTEM_DRIVER','public');
    }

    public static function hello()
    {
        return 'hello';
    }

    private function alphanumeric($string, $delimitier = '')
    {
        return preg_replace('/[^\w]/', $delimitier, $string);
    }

    public function upload(Request $request, $attributeName, $storeTo, $filename, $key = null)
    {
        $file = $request->file($attributeName);
        if(isset($key)){
            $file = $request->file($attributeName)[$key];
        }

        $name = $filename.'.'.$file->getClientOriginalExtension();
        $fullpath = $storeTo.'/'.$name;
        if(substr($storeTo, -1) == '/'){
            $fullpath = $storeTo.$name;
        }

        if(Storage::disk($this->disk)->exists($fullpath)){
            throw new Exception("File already exists", 1);
        }else{
            $path = $file->store($storeTo, $this->disk);
            Storage::disk($this->disk)
                ->move($path, $fullpath);
        }
        return $fullpath;
    }

    public function delete($fullpath)
    {
        if(Storage::disk($this->disk)->exists($fullpath)){
            $delete = Storage::disk($this->disk)->delete($fullpath);
            return $delete;
        }
    }
}