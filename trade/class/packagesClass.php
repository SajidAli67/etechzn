<?php

class GetPackData extends Database(){

    public function getPackTerms($where=null){
        $array=array();

        $sql = "SELECT * FROM tbl_packages WHERE $where ";
        $query = $this->mysqli->query($sql);

        while($row=fetch_assoc()){
            $array[]=$row;
        }
        return $array;
    }
}


 ?>