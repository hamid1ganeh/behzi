<?php
/**
 * Created by PhpStorm.
 * User: design03
 * Date: 26/09/2020
 * Time: 10:49
 */

namespace App\Models\Traits;


trait SitemapableTrait
{
    abstract public function getSitemapUrl();
}