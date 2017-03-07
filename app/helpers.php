<?php

if (! function_exists('cdn_asset')) {
    function cdn_asset($library, $version=null, $cdn=null)
    {
        if ($cdn == null) {
            $cdn = config('frontend.default-cdn', 'bootcss');
        }
        $baseUrl = config('frontend.cdns.' . $cdn . '.base_url', '//cdn.bootcss.com');
        $libName = config('frontend.libs.' . $library . '.name_in_cdn', $library);
        $libVer = ($version==null) ? config('frontend.libs.' . $library . '.version') : $version;
        $prefix = '//' . $baseUrl . '/' . $libName . '/' . $libVer;
        return $prefix;
    }
}
