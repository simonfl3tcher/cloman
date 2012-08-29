<?php 

	abstract class DataboundObject {

		private $ID;
		private $objPDO;
		private $strTableName;
		private $arRelationMap;
		private $forDeletion;
		private $isLoaded;
		private $arModifiedRelations;

		abstract protected function DefineTableName();
		abstract protected function DefineRelationMap();

		public function __construct($id = null){
			/* 
			* The bellow variables are the values set up for database
			* these should really be globals but they are undefined, so i 
			* have just set it up like this for now 
			*/
			$hostname = 'localhost';
			$database = 'vetinary-site';
			$username = 'root';
			$password = '';

			$this->strTableName = $this->DefineTableName();
			$this->arRelationMap = $this->DefineRelationMap();
			$this->strTableID = $this->DefineTableID();
			$strDSN = "mysql:host=" .$hostname . ";dbname=" . $database; 
			$this->objPDO = PDOFactory::GetPDO($strDSN, $username, $password, array());
			$this->isLoaded = false;
			if(isset($id)){
				$this->ID = $id;
			}
			$this->arModifiedRelations = array();
		}

		public function Load(){
			$arRow = array();
			if(isset($this->ID)){
				$strQuery = "SELECT ";
				foreach($this->arRelationMap as $key => $value){
					$strQuery .= $key . ",";
				}
				$strQuery = substr($strQuery, 0, strlen($strQuery) - 1);
				$strQuery .= " FROM " . $this->strTableName . " WHERE " . $this->strTableID . "= :eid";
				$objStatement = $this->objPDO->prepare($strQuery);
				$objStatement->bindParam(":eid", $this->ID, PDO::PARAM_INT);
				$objStatement->execute(); 
				$arRow = $objStatement->fetch(PDO::FETCH_ASSOC);
				foreach($arRow as $key => $value){
					$strMember = $this->arRelationMap[$key];
					if(property_exists($this, $strMember)){
						if(is_numeric($value)){
							eval('$this->' . $strMember . ' = ' . $value . ';');
						} else {
							eval('$this->' . $strMember . ' = "' . $value . '";');
						}
					}
				}
				$this->isLoaded = true;
			} 
		}

		public function Save(){
			if(isset($this->ID)){
				$strQuery = "update " . $this->strTableName . " set ";
				foreach($this->arRelationMap as $key => $value){
					//var_dump($this->arRelationMap);
					eval('$actualVal = &$this->' . $value . ';');
					if(array_key_exists($value, $this->arModifiedRelations)){
						$strQuery .= $key . " = :$value, "; 
					}
				}
				$strQuery = substr($strQuery, 0, strlen($strQuery) - 2);
				$strQuery .= ' WHERE ' . $this->strTableID . ' = :eid';
				unset($objStatement);
				$objStatement = $this->objPDO->prepare($strQuery);
				$objStatement->bindParam(":eid", $this->ID, PDO::PARAM_INT);
				foreach($this->arRelationMap as $key => $value){
					eval('$actualVal = &$this->' . $value . ';');
					if(array_key_exists($value, $this->arModifiedRelations)){
						if(is_int($actualVal) || $actualVal == null){
							$objStatement->bindParam(':' . $value, $actualVal, PDO::PARAM_INT);
						} else {
							$objStatement->bindParam(':' . $value, $actualVal, PDO::PARAM_STR);
						}
					}
				}

				$objStatement->execute();
			} else {
				$strValueList = "";
				$strQuery = 'INSERT INTO ' . $this->strTableName . '(';
					foreach($this->arRelationMap as $key => $value){
						eval('$actualVal = &$this->' . $value . ';');
						if(isset($actualVal)){
							if(array_key_exists($value, $this->arModifiedRelations)){
								$strQuery .= $key . ',';
								$strValueList .= ":$value, ";
							}
						}
					}
				$strQuery = substr($strQuery, 0, strlen($strQuery) - 1);
				$strValueList = substr($strValueList, 0, strlen($strValueList) - 2);
				$strQuery .= ") VALUES (";
				$strQuery .= $strValueList;
				$strQuery .= ")";
				unset($objStatement);
				$objStatement = $this->objPDO->prepare($strQuery);
				foreach($this->arRelationMap as $key => $value){
					eval('$actualVal = &$this->' . $value . ';');
					if(isset($actualVal)){
						if(array_key_exists($value, $this->arModifiedRelations)){
							if(is_int($actualVal) || $actualVal == null){
								$objStatement->bindParam(':' . $value, $actualVal, PDO::PARAM_INT);
							} else {
								$objStatement->bindParam(':' . $value, $actualVal, PDO::PARAM_STR);
							}
						}
					}
				}
				$objStatement->execute();
				$this->ID = $this->objPDO->lastInsertId($this->strTableName . "_id_sql");
			}
			return true;
		}

		public function MarkForDeletion(){
			$this->forDeletion = true;
		}

		public function __destruct(){
			if(isset($this->ID)){
				if($this->forDeletion == true){
					$strQuery = 'DELETE FROM ' . $this->strTableName . ' WHERE ' . $this->strTableID . ' = :eid';
					$objStatement = $this->objPDO->prepare($strQuery);
					$objStatement->bindParam(":eid", $this->ID, PDO::PARAM_INT);
					$objStatement->execute();
				}
			}
		}

		public function __call($strFunction, $arArguments){
			$strMethodType = substr($strFunction, 0, 3);
			$strMethodMember = substr($strFunction, 3);
			switch ($strMethodType){
				case "set":
				return($this->SetAccessor($strMethodMember, $arArguments[0]));
				break;
				case "get":
				return($this->GetAccessor($strMethodMember));
				break;
			}
			return false;
		}

		private function SetAccessor($strMember, $strNewValues){
			if(property_exists($this, $strMember)){
				if(is_numeric($strNewValues)){
					eval('$this->' . $strMember . ' = ' . $strNewValues . ';');
				} else {
					eval('$this->' . $strMember . ' = "' . $strNewValues . '";');
				}
				$this->arModifiedRelations[$strMember] = "1";
			} else {
				return false;
			}
		}

		private function GetAccessor($strMember){
			if($this->isLoaded !== true){
				$this->Load();
			}
			if(property_exists($this, $strMember)){
				eval('$strRetVal = $this->' . $strMember . ';');
				return($strRetVal);
			} else {
				return false;
			}
		}
	}
?>