<?php
/**
 * Created by PhpStorm.
 * User: enco
 * Date: 6.3.16.
 * Time: 23.19
 */

namespace EnRoute;
use PathToRegexp;

class Router
{

    /**
     * This function will strip the script name from URL i.e.
     * http://www.something.com/search/book/fitzgerald will become /search/book/fitzgerald
     * @return string
     */
    public function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri =  '/'.trim($uri, '/');
        return $uri;
    }

    private function toUpper($matches)
    {
        //echo '<br>len:'.var_dump($matches).'<br>'.$matches[0].'<br>';
        return strtoupper(end($matches));
    }

    public function slugToCamelCase($slug)
    {
        $routes = explode('/', $slug);
        $routesCamel = array();
        foreach ($routes as $route) {
            $routesCamel[] = preg_replace_callback('/(^[a-z])|([-_](.))/', array($this, 'toUpper'), $route);
        }
        var_dump($routesCamel);
        $keys = array();
        PathToRegexp::convert('/foo/:bar', $keys);
        var_dump($slug, $keys);
        return preg_replace_callback('/([\/_]|[-_])(.)/', array($this, 'toUpper'), $slug);
    }
}
