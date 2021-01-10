<?php


// grap list with items of model
if (!function_exists('ModelList')) {
    function ModelList($model, $name = 'name'){
        return $model::get()->pluck($name,'id');
    }
}

if (!function_exists('setting')) {
    /**
     * @param null $key
     * @return string
     */
    function setting($key)
    {
        $value = \App\Modules\Core\Models\Setting::where('key', $key)->firstOrFail()->value;
        return $value ?? 'Not Found';
    }
}

if (!function_exists('status')) {
    function status($int = null){
        $array = [
            1 => __('Active'),
            0 => __('Not Active')
        ];
        if (isset($int)){
            return $array[$int];
        }else{
            return $array;
        }
    }
}

if (!function_exists('getLang')) {
    /**
     * @return string
     */
    function getLang()
    {
        return app()->getLocale();
    }

}


