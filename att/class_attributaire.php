<?php 

	class attributaire
	{ 
		private $id_attrib;
		private $n_pr_attrib;
		private $adr_attrib;
		private $cont_attrib;
		private $pdo;
		public function __construct($id_attrib='\N',$n_pr_attrib=' ',$adr_attrib=' ',$cont_attrib=' ')
		{
			$this->id_attrib=$id_attrib;
			$this->n_pr_attrib=$n_pr_attrib;
			$this->adr_attrib=$adr_attrib;
			$this->cont_attrib=$cont_attrib;

			$this->pdo= new PDO('mysql:host=localhost;dbname=test','root','');

		}
		public function e_attributaire()
		{
			$requete="INSERT INTO attributaire (id_attrib,n_pr_attrib,adr_attrib,cont_attrib) VALUES (:aid_attrib,:an_pr_attrib,:aadr_attrib,:acont_attrib)";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_attrib',$this->id_attrib,PDO::PARAM_INT);
			$stmt->bindParam(':an_pr_attrib',$this->n_pr_attrib,PDO::PARAM_STR);
			$stmt->bindParam(':aadr_attrib',$this->adr_attrib,PDO::PARAM_STR);
			$stmt->bindParam(':acont_attrib',$this->cont_attrib,PDO::PARAM_INT);
			$stmt->execute();
			$b=$this->pdo->lastInsertId();
			$stmt->closeCursor();
			return $b;
		}
		public function m_attributaire($id_attrib,$n_pr_attrib)
		{
			$requete="UPDATE attributaire SET n_pr_attrib=:an_pr_attrib WHERE id_attrib=:aid_attrib";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_attrib',$id_attrib,PDO::PARAM_INT);
			$stmt->bindParam(':an_pr_attrib',$n_pr_attrib,PDO::PARAM_STR);
			$stmt ->execute();
			$stmt ->closeCursor();
		}
		public function s_attributaire($id_attrib)
		{
			$requete="DELETE FROM attributaire WHERE id_attrib=:aid_attrib";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_attrib',$id_attrib,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}
		public function af_attributaire()
		{
			$requete="SELECT * FROM attributaire";
			$stmt=$this->pdo->query($requete);
			$result=$stmt->fetchAll();
			$stmt->closeCursor();
			return $result;
		}
	}
?>