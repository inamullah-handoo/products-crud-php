<?php

namespace app;

class Router{
	public array $getRoutes = [];
	public array $postRoutes = [];

	public function get($url, $fn){
		$this->getRoutes[$url] = $fn;
	}

	public function post($url, $fn){
		$this->postRoutes[$url] = $fn;
	}

	public function resolve(){
			// echo '<pre>';
			// var_dump($_SERVER);
			// echo '</pre>';
			$currentUrl = $_SERVER['PATH_INFO'] ?? '/';
			$method = $_SERVER['REQUEST_METHOD'];

			if($method == 'GET'){
				$fn = $this->getRoutes[$currentUrl] ?? null;
			}else{
				$fn = $this->postRoutes[$currentUrl] ?? null;
			}
			if($fn){
				echo '<pre>';
				var_dump($fn);
				echo '</pre>';
				call_user_func($fn);
			}else{
				echo 'Page not found';
			}
	}
}