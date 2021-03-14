<?php
namespace Models;
use Libs\Db;

abstract class Model {
	abstract public static function getTableName();

	public static function all() 
	{
		$db = Db::getInstance();
		return $db->query('SELECT * FROM ' . static::getTableName(), [], static::class);
	}
	public static function getById($id)
	{
		$db = Db::getInstance();	
		$result = $db->query('SELECT * FROM ' . static::getTableName() . ' WHERE id=?', [$id], static::class );
		return $result ? $result[0] : null;
	}

	public function save()
	{
		$reflection = new \ReflectionObject($this);
		$properties = $reflection->getProperties();
		$placeholders = [];
		$params = [];
		$propertiesAdd = [];
		$propertiesAddPlaceholders = [];

		foreach ($properties as $property) {
			$placeholders[] = $property->name . '=:' . $property->name;
			$prop = $property->name;
			$params[$property->name] = $this->$prop;
			$propertiesAdd[] = $property->name;
			$propertiesAddPlaceholders[] = ':' . $property->name;
		}
		if( $this->id ){
			$sql = 'UPDATE ' . static::getTableName(). '  SET ' . implode(', ', $placeholders) . ' WHERE id=:id';	
		}
		else {		
			$sql = 'INSERT INTO ' . static::getTableName() . ' (' . implode(', ', $propertiesAdd) . ') VALUES (' . implode(',', $propertiesAddPlaceholders) . ')';
		}
		$db = Db::getInstance();
		$db->query($sql, $params);
		static::setId($db->pdo->lastInsertId());
	}
	public static function findOneByColumn(string $column, $value)
	{
		$db = Db::getInstance();
		$result = $db->query('SELECT * FROM ' . static::getTableName() . ' WHERE ' . $column . '=?' , [$value], static::class);
		if( !$result ) {return null;}
		return $result[0];
	}
}

