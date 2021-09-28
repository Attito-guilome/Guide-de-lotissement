<?php 
class guide
{
	public $id_guide;
	public $pdo;
	public function __construct($id_guide)
	{
		$this->id_guide=$id_guide;
		$this->pdo= new PDO('mysql:host=localhost;dbname=test','root','');
	}
	public function af_guide()
	{
		$requete="SELECT * FROM lotissement lo INNER JOIN ilot i ON lo.id_lotis=i.id_lotis INNER JOIN lot l ON l.id_ilot=i.id_ilot INNER JOIN attestation at ON at.id_attes=l.id_attes INNER JOIN attributaires a ON a.id_attrib=l.id_attrib INNER JOIN piece p ON p.id_attrib=a.id_attr WHERE lo.id_lotis=:aid_lotis";
		$stmt=$this->pdo->prepare($requete);
		$stmt->bindParam(':aid_lotis',$this->id_guide,PDO::PARAM_INT);
		$stmt->execute();
		$result=$stmt->fetchAll();
		$stmt->closeCursor();
		return $result;
	}
}
?>
