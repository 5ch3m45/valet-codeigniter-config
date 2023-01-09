<?php

class CodeIgniterValetDriver extends ValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        if (file_exists($sitePath.'/system/index.html')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the incoming request is for a static file.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string|false
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        if (file_exists($staticFilePath = $sitePath.$uri)) {
            return $staticFilePath;
        }

        return false;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        if(preg_match('/sociabuzz/', $sitePath.$uri) && preg_match('/creator\//', $sitePath.$uri)) {
            return $sitePath.'/creator/index.php';
        } else if(preg_match('/sociabuzz/', $sitePath.$uri) && preg_match('/payment/', $sitePath.$uri)) {
            return $sitePath.'/payment/index.php';
        } else if(preg_match('/sociabuzz/', $sitePath.$uri) && preg_match('/proaccount/', $sitePath.$uri)) {
            return $sitePath.'/proaccount/index.php';
        } else if(preg_match('/sociabuzz/', $sitePath.$uri) && preg_match('/pro\//', $sitePath.$uri)) {
            return $sitePath.'/pro/index.php';
        } else {
            return $sitePath.'/index.php';
        }
    }
}
