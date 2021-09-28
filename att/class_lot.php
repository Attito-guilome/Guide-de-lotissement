<?php 

	class lot
	{ 
		private $id_lot;
		private $id_attrib;
		private $id_ilot;
		private $id_attes;
		private $deb_lot;
		private $fin_lot;
		private $pdo;
		private $table="lot";
		public function __construct($id_lot='\N',$id_attrib=' ',$id_ilot=' ',$id_attes=' ',$deb_lot=' ',$fin_lot=' ')
		{
			$this->id_lot=$id_lot;
			$this->id_attrib=$id_attrib;
			$this->id_ilot=$id_ilot;
			$this->id_attes=$id_attes;
			$this->deb_lot=$deb_lot;
			$this->fin_lot=$fin_lot;
			$this->pdo= new PDO('mysql:host=localhost;dbname=test','root','');	
		}
		public function e_lot()
		{
			$requete="INSERT INTO lot (id_lot,id_attrib,id_ilot,id_attes,deb_lot,fin_lot) VALUES (:aid_lot,:aid_attrib,:aid_ilot,:aid_attes,:adeb_lot,:afin_lot)";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_lot',$this->id_loti,PDO::PARAM_INT);
			$stmt->bindParam(':aid_attrib',$this->id_attrib,PDO::PARAM_INT);
			$stmt->bindParam(':aid_ilot',$this->id_ilot,PDO::PARAM_INT);
			$stmt->bindParam(':aid_attes',$this->id_attes,PDO::PARAM_INT);
			$stmt->bindParam(':adeb_lot',$this->deb_lot,PDO::PARAM_INT);
			$stmt->bindParam(':afin_lot',$this->fin_lot,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
			return true;
		}
		public function e_ligne_lot()
		{
			$requete="INSERT INTO ligne_lot(id_lot,id_attrib,id_ilot,id_attes,num_lot) VALUES (:aid_lot,:aid_attrib,:aid_ilot,:aid_attes,:anum_lot)";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_lot',$this->id_loti,PDO::PARAM_INT);
			$stmt->bindParam(':aid_attrib',$this->id_attrib,PDO::PARAM_INT);
			$stmt->bindParam(':aid_ilot',$this->id_ilot,PDO::PARAM_INT);
			$stmt->bindParam(':aid_attes',$this->id_attes,PDO::PARAM_INT);
			$stmt->bindParam(':anum_lot',$this->deb_lot,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
			return true;
		}
		public function m_lot($id_lot,$deb_lot,$fin_lot)
		{
			$requete="UPDATE lot SET deb_lot=:adeb_lot,fin_lot=:afin_lot WHERE id_lot=:aid_lot";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_lot',$id_lot,PDO::PARAM_INT);
			$stmt->bindParam(':adeb_lot',$deb_lot,PDO::PARAM_INT);
			$stmt->bindParam(':afin_lot',$fin_lot,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}

		public function m_ligne_lot($num_lot,$id_attrib)
		{
			$requete="UPDATE ligne_lot SET id_attrib=:aid_attrib WHERE num_lot=:anum_lot";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_attrib',$id_attrib,PDO::PARAM_INT);
			$stmt->bindParam(':anum_lot',$num_lot,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}

		public function s_lot($id_lot)
		{
			$requete="DELETE FROM lot WHERE id_lot=:aid_lot";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_lot',$id_lot,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}
		public function af_lot()
		{
			$requete="SELECT * FROM lot";
			$stmt=$this->pdo->query($requete);
			$result=$stmt->fetchAll();
			$stmt->closeCursor();
			return $result;
		}
		public function fin_lot($id_loti)
		{
			$anum_ilot;
			$requete="SELECT fin_lot FROM lot INNER JOIN ilot ON lot.id_ilot=ilot.id_ilot INNER JOIN lotissement ON lotissement.id_loti=ilot.id_loti WHERE lotissement.id_loti=:aid_loti ORDER BY fin_lot DESC";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_loti',$id_loti,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->bindColumn('fin_lot', $anum_ilot);
			$stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			return $anum_ilot;
		}
	}
?>