<?php 

	class ilot
	{ 
		private $id_ilot;
		private $id_lotis;
		private $num_ilot;
		private $pdo;
		public function __construct($id_ilot='\N',$id_loti=' ',$num_ilot=' ')
		{
			$this->id_ilot=$id_ilot;
			$this->id_loti=$id_loti;
			$this->num_ilot=$num_ilot;
			$this->pdo= new PDO('mysql:host=localhost;dbname=test','root','');
		}
		public function e_ilot()
		{
			$requete="INSERT INTO ilot (id_ilot,id_loti,num_ilot) VALUES (:aid_ilot,:aid_loti,:anum_ilot)";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_ilot',$this->id_ilot,PDO::PARAM_INT);
			$stmt->bindParam(':aid_loti',$this->id_loti,PDO::PARAM_INT);
			$stmt->bindParam(':anum_ilot',$this->num_ilot,PDO::PARAM_INT);
			$stmt->execute();
			$b=$this->pdo->lastInsertId();
			$stmt->closeCursor();
			return $b;
		}
		public function m_ilot($id_ilot,$num_ilot)
		{
			$requete="UPDATE ilot SET num_ilot=:anum_ilot WHERE id_ilot=:aid_ilot";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_ilot',$id_ilot,PDO::PARAM_INT);
			$stmt->bindParam(':anum_ilot',$num_ilot,PDO::PARAM_INT);
			$stmt ->execute();
			$stmt ->closeCursor();
		}
		public function s_ilot($id_ilot)
		{
			$requete="DELETE FROM ilot WHERE id_ilot=:aid_ilot";	
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_ilot',$id_ilot,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}
		public function af_ilot()
		{
			$requete="SELECT * FROM ilot";
			$stmt=$this->pdo->query($requete);
			$result=$stmt->fetchAll();
			$stmt->closeCursor();
			return $result;
		}
		public function num_ilot($id_ilot=10)
		{
			$anum_ilot;
			$requete="SELECT num_ilot FROM ilot WHERE id_loti=:aid_loti ORDER BY num_ilot DESC";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_loti',$id_ilot,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->bindColumn('num_ilot', $anum_ilot);
			$stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			return $anum_ilot;

		}
		public function join_ilot_lot($id_ilot)
		{
   			 $requete="SELECT * FROM ilot INNER JOIN lotissement ON ilot.id_loti=lotissement.id_loti INNER JOIN lot ON lot.id_ilot=ilot.id_ilot WHERE lotissement.id_loti=:aid_loti";
    		$stmt=$this->pdo->prepare($requete);
    		$stmt->bindParam(':aid_loti',$id_ilot,PDO::PARAM_INT);
    		$stmt->execute();
    		while($ligne=$stmt->fetch(PDO::FETCH_ASSOC)) 
    		{
    			echo '<tr>
                  
                  <td>'.$ligne['num_ilot'].'</td>
                  <td>'.$ligne['deb_lot'].'</td>
                  <td>'.$ligne['fin_lot'].'</td>
                  <td class="text-center">
                    <a href="modifIlot.php?id_ilot='.$ligne['id_ilot'].'&id_lot='.$ligne['id_lot'].'&id_loti='.$ligne['id_loti'].'&id_attrib='.$ligne['id_attrib'].'&loti='.$ligne['loti'].'"><button type="button" class="btn btn-success_"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                      </button></a>

                     <a href="./att/traitement.php?id_ilot='.$ligne['id_ilot'].'"><button type="button" class="btn btn-danger_"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                   </button></a>
                  </td>
                  </tr>
                  <tr>';
    		}
    		$stmt->closeCursor();
		}
		public function af_un_ilot_lot($id_ilot,$id_lot,$id_attrib)
		{
			$requete="SELECT num_ilot,deb_lot,fin_lot,n_pr_attrib FROM ilot INNER JOIN lot INNER JOIN attributaire ON lot.id_attrib=attributaire.id_attrib WHERE ilot.id_ilot=:aid_ilot AND lot.id_lot=:aid_lot AND attributaire.id_attrib =:aid_attrib";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_ilot',$id_ilot);
			$stmt->bindParam(':aid_lot',$id_lot);
			$stmt->bindParam(':aid_attrib',$id_attrib);
			$stmt->execute();
			$result=$stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			return $result;
		}
}
?>