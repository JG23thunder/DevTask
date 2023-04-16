<?php 
namespace App\Core\Form;
use App\Core\Model;
class Form
{

	public static function begin($action, $method)
	{
		echo sprintf('<form action="%s" method="%s">', $action, $method);
		return new Form();
	}

	public static function end()
	{
		echo '</form>';
	}

	public function field(Model $model, $attribute)
	{
		return new Field($model, $attribute);
	}

	public function __toString()
	{
		return sprintf('<div class="form-group">
    						<label >%s</label>
    						<input type="text"  name="%s" value="%s" class="form-control%s">

    						<div class="invalid-feedback">
    							%s
    						</div>


  					</div>', $this->attribute, 
  					        $this->attribute,
  					        $this->model->{$this->attribute},
  					      	$this->$model->hasError($this->attribute) ? 'is-invalid' : '',
  					        $this->model->getFirstError($this->attribute));
	}

}