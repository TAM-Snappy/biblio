<?php

class App 
{
    protected $controller = 'manga';
    protected $method = 'index';

    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if(file_exists('../app/controllers/'.$url[0].'Controller.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../app/controllers/'.$this->controller.'Controller.php';
        
        $this->controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : []; 

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if(isset($_GET['url'])) {
            if(preg_match("#^.*[\\\,;:!?\*].*$#",$_GET['url'])){
                echo "Erreur dans le nommage d'un paramètre !";
                return ['',''];
            }
            // supp les espaces de l'url
            //return explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
            return explode('/', rtrim($_GET['url'],'/'));
        }
        else{
            return ['',''];
        }
    }
}