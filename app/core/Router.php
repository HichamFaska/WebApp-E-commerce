<?php

namespace app\core;

class Router
{
    public Response $response;
    protected Request $request;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->response = $response;
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path =  $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setResponseCode(404);
            return $this->renderView('error');
            exit;
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }
        
        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params)
    {

        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /*     private function renderErrorCode($code)
    {
        ob_start();
        switch ($code) {
            case 404:
                return 'error';
                break;
            default:
                return 404;
                break;
        }
        return ob_get_clean();;
    } */

    private function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/app/views/layouts/main.php";
        return ob_get_clean();
    }
    private function renderOnlyView($view, $params)
    {

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/app/views/$view.php";
        return ob_get_clean();
    }
}
