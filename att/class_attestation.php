<?php 

	class attestation
	{ 
		private $id_attes;
		private $num_attes;
		private $dat_attes;
		public $pdo;
		public function __construct($id_attes='\N',$num_attes=' ',$dat_attes=' ')
		{
			$this->id_attes=$id_attes;
			$this->num_attes=$num_attes;
			$this->dat_attes=$dat_attes;
			$this->pdo= new PDO('mysql:host=localhost;dbname=test','root','');
		}
		public function e_attestation()
		{
			$requete="INSERT INTO attestation (id_attes,num_attes,dat_attes) VALUES (:aid_attes,:anum_attes,:adat_attes)";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_attes',$this->id_attes,PDO::PARAM_INT);
			$stmt->bindParam(':anum_attes',$this->num_attes,PDO::PARAM_INT);
			$stmt->bindParam(':adat_attes',$this->dat_attes,PDO::PARAM_STR);
			$stmt->execute(); 
			$b=$this->pdo->lastInsertId();
			$stmt->closeCursor();
			return $b;
		}
		public function m_attestation($id_attes)
		{
			$requete="UPDATE attestation SET num_attes=:anum_attes,dat_attes=:adat_attes WHERE id_attes=:aid_attes";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_attes',$id_attes,PDO::PARAM_INT);
			$stmt ->execute();
			$stmt ->closeCursor();
		}
		public function s_attestation($id_attes)
		{
			$requete="DELETE FROM attestation WHERE id_attes=:aid_attes";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_attes',$id_attes,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}
		public function af_attestation()
		{
			$requete="SELECT * FROM attestation";
			$stmt=$this->pdo->query($requete);
			$result=$stmt->fetchAll();
			$stmt->closeCursor();
			return $result;
		}
	}
?>