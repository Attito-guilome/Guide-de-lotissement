<?php
	class lotissement
	{
		private $id_loti;
		private $loti;
		private $situ;
		private $arrete;
		private $tf;
		private $c_fonc;
		private $pdo;
		public function __construct($id_loti='\N',$loti='',$situ='',$arrete='',$tf='',$c_fonc='')
		{
			$this->id_loti=$id_loti;
			$this->loti=$loti;
			$this->situ=$situ;
			$this->arrete=$arrete;
			$this->tf=$tf;
			$this->c_fonc=$c_fonc;
			$this->pdo= new PDO('mysql:host=localhost;dbname=test','root','');
		}
		public function e_lotissement()
		{
			$requete="INSERT INTO lotissement (id_loti,loti,situ,arrete,tf,c_fonc) VALUES (:aid_loti,:aloti,:asitu,:aarrete,:atf,:ac_fonc)";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_loti',$this->id_loti,PDO::PARAM_INT);
			$stmt->bindParam(':aloti',$this->loti,PDO::PARAM_STR);
			$stmt->bindParam(':asitu',$this->situ,PDO::PARAM_STR);
			$stmt->bindParam(':aarrete',$this->arrete,PDO::PARAM_INT);
			$stmt->bindParam(':atf',$this->tf,PDO::PARAM_STR);
			$stmt->bindParam(':ac_fonc',$this->c_fonc,PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();
			return true;
		}
		public function m_lotissement($id_loti)
		{
			$requete="UPDATE lotissement SET loti=:aloti,situ=:asitu,arrete=:aarrete,tf=:atf,c_fonc=:ac_fonc WHERE id_loti=:aid_loti";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_loti',$id_loti,PDO::PARAM_INT);
			$stmt->bindParam(':aloti',$this->loti,PDO::PARAM_STR);
			$stmt->bindParam(':asitu',$this->situ,PDO::PARAM_STR);
			$stmt->bindParam(':aarrete',$this->arrete,PDO::PARAM_STR);
			$stmt->bindParam(':atf',$this->tf,PDO::PARAM_STR);
			$stmt->bindParam(':ac_fonc',$this->c_fonc,PDO::PARAM_STR);
			$stmt ->execute();
			$stmt ->closeCursor();
		}
		public function s_lotissement($id_loti)
		{
			$requete="DELETE FROM lotissement WHERE id_loti=:aid_loti";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam(':aid_loti',$id_loti,PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
			return true;
		}
		public function af_lotissement()
		{
			$requete="SELECT * FROM lotissement";
			$stmt=$this->pdo->query($requete);
			$result=$stmt->fetchAll();
			$c=count($result);
			$r=$c/4;
			$q=4;
			if(is_double($r))
			{
				$r=(int)($r+1);
				$q=3;
			}
			$cont=0;
				//echo '<div class="col">';
				for($m=0;$m<$c;$m++)
				{
					echo '<div class="card shadow-sm" >
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">'.$result[$cont][1].'</text></svg>

              <div class="card-body">
                <p class="card-text">cliquer pour ajouter des ILOT</p>
                <div  style="background-color:;">

                  <div class="btn-group" style="display:flex;justify-content: center;">
				  <div style="flex:1;">
                    <a href="guide.php?id_loti='.$result[$cont][0].'&loti='.$result[$cont][1].'"><button type="button" class="btn btn-sm btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-plus" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                      <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                    </svg> Ajouter</button></a>
					</div>
					<div style="flex:1;">
                    <a href="modifGuide.php?id_loti='.$result[$cont]['id_loti'].'"><button type="button" class="btn btn-sm btn-outline-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg> Editer</button></a>
					</div>
					<div style="flex:1;">
                    <a href="att/traitement.php?id_loti='.$result[$cont]['id_loti'].'&name=btn&value=Suppr"><button type="button" class="btn btn-sm btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg> Suppr</button></a>
					</div>
					<div style="flex:1;">
                    <a href="./att/class_pdf.php?id_loti='.$result[$cont]['id_loti'].'" target="_blank"><button type="button" class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                      <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                      <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                    </svg> PDF</button></a>
					</div>

                  </div>

                </div>
              </div>
            </div>';
					$cont++;
				}

				//echo "</div>";

			$stmt->closeCursor();
		}
		public function af_un_lotissement($id_loti)
		{
			$requete="SELECT * FROM lotissement WHERE id_loti=:aid_loti";
			$stmt=$this->pdo->prepare($requete);
			$stmt->bindParam('aid_loti',$id_loti,PDO::PARAM_INT);
			$stmt->execute();
			$result=$stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			return $result;
		}
	}
?>
