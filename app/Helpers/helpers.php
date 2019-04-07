<?php

if (! function_exists('http_client')) {
    function http_client(array $options = [])
    {
        return new \GuzzleHttp\Client($options);
    }
}

if (! function_exists('geo_client'))
{
    function geo_client()
    {
        return new GeoNames\Client(env('GEONAMES_USERNAME'));
    }
}