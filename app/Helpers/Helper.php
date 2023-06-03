<?php


if (!function_exists('display_sort_arrow')) {
    function display_sort_arrow($column)
    {
        $next_query_string_parameters = [];
        $current_query_string_parameters = request()->except(['dir', 'sort']);
        $params = [];
        $icon = 'fa-sort-up';
        $icon_color = 'text-primary';

        if (request()->has('sort') && request('sort') == $column) {

            if (request('dir') == 'desc') {
                $params = ['sort' => $column, 'dir' => 'asc'];
                $icon = 'fa-sort-down';
                $icon_color = 'text-danger';
            }

        } else {
            $params = ['sort' => $column, 'dir' => 'desc'];
            $icon = 'fa-sort';
            $icon_color = 'text-dark';
        }

        $next_query_string_parameters = array_merge($current_query_string_parameters, $params);


        $route = route(request()->route()->getName(), $next_query_string_parameters);

        $icon_element_class = "fa {$icon} {$icon_color}";
        $icon_element = "<i class='{$icon_element_class}'></i>";
        $route_element = "<a href={$route}>{$icon_element}</a>";

        return $route_element;
    }
}

if (!function_exists('getIp')) {
    function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
    }
}


if (!function_exists('base64trimmer')) {
    /**
     * @param $data
     * @return bool|string
     * @throws Exception
     */
    function base64trimmer($data)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {

            $data = substr($data, strpos($data, ',') + 1);
            $type = strtolower($type[1]);

            if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                throw new \Exception('Image Type is Not valid');
            }


            if ($data === false) {
                throw new \Exception('Failed to Decode BASE64');
            }

        } else {
            throw new \Exception('Data Not Matched With Image Data');
        }

        return $data;
    }
}

if (!function_exists('cdn_asset')) {
    function cdn_asset(string $path, bool $asset = false)
    {
        if($asset)
        {
            return asset($path);
        }
    }
}
