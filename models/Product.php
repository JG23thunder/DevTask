<?php

namespace App\Models;
use App\Core\Model;
use App\Core\DbModel;
class Product extends DbModel
{
	public string $sku = '';
	public string $name = '';
	public string $price = '';
	public string $type = '';
	public string $size = '';
	public string $height = '';
	public string $length = '';
	public string $width = '';
	public string $weight = '';


	public function setId($id)
{
    $this->id = $id;
}


	public function primaryKey(): string
	{
		return 'id';
	}

	public function tableName(): string
	{
		return 'products';
	}


	public function store()
	{
		return $this->save();
	}

	public function addproduct()
	{
		return $this->save();
	}


	public static function find($id)
	{
		 $tableName = (new static())->tableName();
    	$primaryKey = (new static())->primaryKey();
   		$statement = self::prepare("SELECT * FROM $tableName WHERE $primaryKey = :id");
    	$statement->bindValue(':id', $id);
    	$statement->execute();
    	return $statement->fetchObject(static::class);
	}

	 public function delete()
    {
    	  $tableName = $this->tableName();
   		 $primaryKey = $this->primaryKey();
    	$statement = self::prepare("DELETE FROM $tableName WHERE $primaryKey = :id");
   		 $statement->bindValue(":id", $this->{$primaryKey});
    	$statement->execute();
   
    return $statement->rowCount();
    }


	public function rules():array
	{

		if($this->type === 'dvd')
		{
			return ['sku' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
	            	'name' => [self::RULE_REQUIRED],
	            	'price' => [self::RULE_REQUIRED,self::RULE_NUMERIC],
	            	'type' => [self::RULE_REQUIRED],
					'size' => [self::RULE_REQUIRED, self::RULE_NUMERIC]];
		}

		if($this->type === 'furniture')
		{
			
			return ['sku' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
	            'name' => [self::RULE_REQUIRED],
	            'price' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
	            'type' => [self::RULE_REQUIRED],
	            'height' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
			    'width' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
			    'length' => [self::RULE_REQUIRED, self::RULE_NUMERIC]];

			
		}


		if($this->type === 'book')
		{
			return ['sku' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
	            	'name' => [self::RULE_REQUIRED],
	            	'price' => [self::RULE_REQUIRED,self::RULE_NUMERIC],
				   'weight' => [self::RULE_REQUIRED, self::RULE_NUMERIC]];
		}



		
				return [
	    		         'sku' => [self::RULE_REQUIRED,self::RULE_UNIQUE],
	    		         'name' => [self::RULE_REQUIRED],
	            		'price' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
	            		'type' => [self::RULE_REQUIRED],
	            	//newly added code for validation
	            	'size' => [$this->type === 'dvd' ? self::RULE_REQUIRED : '', $this->type === 'dvd' ? [self::RULE_NUMERIC] : ''],
       				 'height' => [$this->type === 'furniture' ? self::RULE_REQUIRED : '', $this->type === 'furniture' ? [self::RULE_NUMERIC] : ''],
 			        'length' => [$this->type === 'furniture' ? self::RULE_REQUIRED : '', $this->type === 'furniture' ? [self::RULE_NUMERIC] : ''],
       			   'width' => [$this->type === 'furniture' ? self::RULE_REQUIRED : '', $this->type === 'furniture' ? [self::RULE_NUMERIC] : ''],
        	     	'weight' => [$this->type === 'book' ? self::RULE_REQUIRED : '', $this->type === 'book' ? [self::RULE_NUMERIC] : ''],
		



	 /*           'size' => [self::RULE_REQUIRED],
	            'height' => [self::RULE_REQUIRED],
	            'length' => [self::RULE_REQUIRED],
	            'width' => [self::RULE_REQUIRED],
	            'weight' => [self::RULE_REQUIRED],*/
	            ];



/*
		return ['sku' => [self::RULE_REQUIRED],
	            'name' => [self::RULE_REQUIRED],
	            'price' => [self::RULE_REQUIRED],
	            'type' => [self::RULE_REQUIRED],
	            'size' => [self::RULE_REQUIRED],
	            'height' => [self::RULE_REQUIRED],
	            'length' => [self::RULE_REQUIRED],
	            'width' => [self::RULE_REQUIRED],
	            'weight' => [self::RULE_REQUIRED],
	            ];*/
	}

	public function attributes(): array
	{
		return ['sku', 'name', 'price', 'type','size', 'height',  'length', 'width', 'weight'];
	}	


}