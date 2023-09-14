<?php
//grab form data
$faculty = $_POST;
$fname = $_POST['fname'];
$lname = $_POST['lname'];
//delete the submit button from array
unset($faculty['submit']);
$array_of_parameters = array();
foreach($faculty as $key=>$val){
        $array_of_parameters[$key] = $val;
        $fields[] = sprintf("%s=?", $key);
}
$field_list = join(',', $fields);

try {
    $dbh = new PDO('mysql:host=localhost;dbname=kiosk', 'kiosk', 'K10$k');
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $update =   'UPDATE fhours SET '.$field_list. 'WHERE fname="'.$fname.'" AND '.
                        'lname="'.$lname.'"';
    $stmt = $dbh->prepare($update);
    //echo $stmt->debugDumpParams();
    $stmt->execute(array($array_of_parameters));

    if($stmt->rowCount() == 0){
        $insert = 'INSERT INTO fhours ('.implode(",", array_keys($faculty)).')'.
                    ' VALUES (:'.implode(",:", array_keys($faculty)).')';
        $stmt = $dbh->prepare($insert);
        $stmt->execute(array($array_of_parameters));
    }
}
catch(PDOException $e){
    echo $e->getMessage();
    exit(); 
}

$dbh=null;
?>