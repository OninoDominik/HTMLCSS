<?php 
/**
 * 
 */
class Licencie
{
	var $id ='';
	var $tbl = "licencie";
	
	function __construct($id)
	{
		if ($id=='new')
		{
			$db = new Database();
			$this->id=$db->insertNew($this->tbl);
		}
		else if (is_int($id)){
			$this->id=$id;
		}
		
	}
	function set($champs,$value){
		$db = new Database();
		$db->revise($this->tbl,$champs,$this->id, $value);
	}
	function get($champs){
		$db = new Database();
		$value = $db->choose($this->tbl, $champs, $this->id);
		return $value['0'][$champs];
	} 
}

?>