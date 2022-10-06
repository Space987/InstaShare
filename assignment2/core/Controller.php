<?php
namespace assignment2\core;

class Controller{
	protected function view($name, $data = []){
		//call in a view to display
		include('assignment2\\views\\' . $name .'.php');
	}
}