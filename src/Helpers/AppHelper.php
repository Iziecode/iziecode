<?php 

namespace Iziedev\Iziecode\Helpers;
use Iziedev\Iziecode\App\Models\Menu;

class AppHelper{
    public static function uploader(array $form, Request $request)
    {
        $uploaded = [];
        foreach ($form as $item) {
            if (array_key_exists('type', $item) && $item['type'] == 'file') {
                if ($request->hasFile($item['name']) && is_array($request->file($item['name']))) {
                    foreach ($request->file($item['name']) as $file) {
                        $uploaded[$item['name']][] = 'storage/' . $file->store('files', 'public');
                    }
                } elseif ($request->hasFile($item['name'])) {
                    $uploaded[$item['name']] = 'storage/' . $request->{$item['name']}->store('files', 'public');
                }
            }
        }
        return $uploaded;
    }

    public static function viewRelation($object, $relation)
    {
        if ($object !== null) {
            $arr = explode('->', $relation);
            switch (count($arr)) {
                case 1:
                    return @$object->{$arr[0]};
                    break;
                case 2:
                    return @$object->{$arr[0]}->{$arr[1]};
                    break;
                case 3:
                    return @$object->{$arr[0]}->{$arr[1]}->{$arr[2]};
                    break;
                case 4:
                    return @$object->{$arr[0]}->{$arr[1]}->{$arr[2]}->{$arr[3]};
                    break;
                default:
                    return 'Relation more than 4, please add ';
                    break;
            }
        } else {
            return '';
        }
    }

    public static function config(array $conf = [], $key)
    {

        if (!empty($conf[$key])) {
            if (is_bool($conf[$key])) {
                return $conf[$key];
            } else {
                $role = Auth::guard()->user()->role;
                return $role == $conf[$key] ? true : false;
            }
        } else {
            $default = [
                'index.show.is_show' => true,
                'index.create.is_show' => true,
                'index.delete.is_show' => true,
                'index.edit.is_show' => true
            ];

            $config = array_merge($default, $conf);
            return $config[$key];
        }
    }

    public static function renderMenu()
    {
        return $menu = Menu::whereNull('parent_id')->get();
        //    return dd($menu);
    }
}