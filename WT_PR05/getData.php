<?php
include 'ConnectionFile.php';


$result = $conn->query("SELECT * FROM books"); 
$outp = "";

while($rs = $result->fetch_array()) {
    if ($outp != "") {
        $outp .= ",";
    }
    $outp .= '{"ID":"' . $rs["id"] . '",'; 
    $outp .= '"Title":"' . $rs["title"] . '",'; 
    $outp .= '"Author":"' . $rs["author"] . '",'; 
    $outp .= '"Genre":"' . $rs["genre"] . '"}'; 
}

$outp = '{"records":['.$outp.']}';
$conn->close();
echo($outp);
?>
