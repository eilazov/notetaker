<?php 

class Bootstrap{
	private $controller;
	private $action;
	private $request;

	public function __construct($request){
		$this->request = $request;

		if($this->request['controller'] == ""){
			$this->controller = 'users';

			if (isset($_SESSION['is_logged_in'])) {
				$this->controller = 'notes';
			}

		} else {
			$this->controller = $this->request['controller'];
		}

		if($this->request['action'] == ""){
			$this->action = 'login';

			if (isset($_SESSION['is_logged_in'])) {
				$this->action = 'index';
			}

		} else {
			$this->action = $this->request['action'];
		}
	}

	public function createController(){
		if(class_exists($this->controller)){
			$parents = class_parents($this->controller);
			if (in_array('Controller', $parents)) {
				if(method_exists($this->controller, $this->action)){
					return new $this->controller($this->action, $this->request);
				} else {
					echo '<h1>Error 404</h1>';
					return;
				}
			} else {
				echo '<h1>Error 404</h1>';
				return;
			}
		} else {
			echo '<h1>Error 404</h1>';
			return;
		}
	}
}

?>