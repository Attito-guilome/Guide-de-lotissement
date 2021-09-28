<?php 
	class piece
	{ 
		private $id_piec;
		private $id_attrib;
		private $nat_piec;
		private $num_piec;
		private $dat_piec;
		private $pdo;
		public function __construct($id_piec='\N',$id_attrib=' ',$nat_piec=' ',$num_piec=' ',$dat_piec=' ')
		{
			$this->id_piec=$id_piec;
			$this->id_attrib=$id_attrib;
			$this->nat_piec=$nat_piec;
			$this->num_piec=$num_piec;
			$this->dat_piec=$dat_piec;
			$this->pdo= new PDO('mysql:host=localhost;dbname=test','root','');
		}
		public function e_piece()
		{
			$requete="INSERT INTO piece (id_piec,id_attrib,nat_piec,num_piec,dat_piec) VALUES (:aid_piec,:aid_attrib,:anat_piec,:anum_piec,:adat_piec)";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_piec',$this->id_piec,PDO::PARAM_INT);
			$stmt->bindParam(':aid_attrib',$this->id_attrib,PDO::PARAM_INT);
			$stmt->bindParam(':anat_piec',$this->nat_piec,PDO::PARAM_STR);
			$stmt->bindParam(':anum_piec',$this->num_piec,PDO::PARAM_STR);
			$stmt->bindParam(':adat_piec',$this->dat_piec,PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();
			return true;
		}
		public function m_piece($id_piec)
		{
			$requete="UPDATE piece SET nat_piec=:anat_piec,num_piec=:anum_piec,dat_piec=:adat_piec WHERE id_piec=:aid_piec";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_piec',$id_piec,PDO::PARAM_INT);
			$stmt->bindParam(':anat_piec',$nat_piec,PDO::PARAM_STR);
			$stmt->bindParam(':anum_piec',$num_piec,PDO::PARAM_INT);
			$stmt->bindParam(':adat_piec',$dat_piec,PDO::PARAM_STR);
			$stmt ->execute();
			$stmt ->closeCursor();
		}
		public function s_piece($id_piec)
		{
			$requete="DELETE FROM piece WHERE id_piec=:aid_piec";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_piec',$id_piec,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}
		public function af_piece()
		{
			$requete="SELECT * FROM piece";
			$stmt=$this->pdo->query($requete);
			$result=$stmt->fetchAll();
			$stmt->closeCursor();
			return $result;
		}
	}
?>