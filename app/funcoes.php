<?php

function validaRota($rotas)
{
    $url = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
    if($url['path'] == '/')
    {
        return 'home';
    }    
    
    $pathExplode = explode('/', $url['path']);
    $page = $pathExplode[1];    
    if(!in_array($page, $rotas) || !file_exists(APPLICATION_PATH.'/'.$page.'.php'))
    {
      header('HTTP/1.0 404 Not Found');
      return 'notfound';
    }
    else
    {
      return $page;    
    }
}