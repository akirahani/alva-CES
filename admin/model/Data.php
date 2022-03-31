<?php
class Data{
	protected $con;
	public function __construct()
    {
    	try 
    	{
		    #$this->con=new PDO("mysql:host=localhost;dbname=nhdiegxm_dienphuc;charset=utf8", "nhdiegxm_dienphuc", "]7&tVTpPaAP(");
		    $this->con=new PDO("mysql:host=localhost;dbname=titanstone;charset=utf8", "root", "");
		}
		catch (Exception $e) 
		{
		    echo '<h1 style="text-align:center">Connect fail!</h1>';
		}
    }
}
?>