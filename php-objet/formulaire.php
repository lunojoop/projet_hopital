<?php
class Form
{
	public $name;
	public $text;
	public $data;
	public $surround ='p';
	
	public function __construt($data=array())
	{
		$this->data = $data;
	} 
	private function surround($html){
		return "<{$this->surround}>$html</{$this->surround}>";
	}
	public function label($name){
		return $this->surround('<label for="'.$name.'">'. $name .'</label>');
	}
	public function input($name){
		return $this->surround('<input type="text" name="' . $name . '">');
	}
	public function input_mopass($name){
		return $this->surround('<input type="password" name="' . $name . '">');
	}
	
	public function submit(){

		return $this->surround('<button type="submit">Envoyer</button>');
		
	}
}