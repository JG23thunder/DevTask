<?php
namespace App\Core;
use App\Core\Model;
use PDO;
abstract class DbModel extends Model
{
	abstract public function tableName(): string;

	abstract public function attributes(): array;

	abstract public function primaryKey(): string;

     //newly added code
    public function getDb(): PDO
    {
        return Application::$app->db->pdo;
    }


	public function save()
	{

	$tableName = $this->tableName();
    $attributes = $this->attributes();
    $params = array_map(fn($attr) => ":$attr", $attributes);

    $statement = self::prepare("INSERT INTO $tableName(".implode(',',$attributes).") VALUES(".implode(',', $params).")");    

    foreach($attributes as $attribute)
    {
        $value = $this->{$attribute};
        $statement->bindValue(":$attribute", $value);
    }

    $statement->execute();
    return true;

	}


public static function findAll()
{
    $tableName = (new static())->tableName();
    $statement = self::prepare("SELECT * FROM $tableName");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, static::class);
}

public function delete()
{
    $tableName = $this->tableName();
    $primaryKey = $this->primaryKey();

    $statement = self::prepare("DELETE FROM $tableName WHERE $primaryKey = :id");
    $statement->bindValue(":id", $this->{$primaryKey});
    $statement->execute();
}






	public static function prepare($sql)
	{
		return Application::$app->db->pdo->prepare($sql);
	}

}