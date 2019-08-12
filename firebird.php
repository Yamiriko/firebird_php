<?php
try {
	$pdo = new PDO("firebird:dbname=localhost:C:\EMPLOYEE.FDB", "SYSDBA", "masterkey");
}  
catch (PDOException $e)
{
	echo $e->getMessage();
}

header("Content-type:application/json");
$respon = array();
$respon["data"] = array();
$kue = "SELECT * FROM COUNTRY";
$sql = $pdo->prepare($kue);
$sql->execute();
$jum = $sql->rowCount();
while($data=$sql->fetch(PDO::FETCH_ASSOC)){
	array_push($respon["data"], $data);
}
$respon["pesan"]="sukses";
echo json_encode($respon, JSON_PRETTY_PRINT);

/*
?>
<table>
<thead>
<tr>
	<th>COUNTRY</th>
	<th>CURRENCY</th>
</tr>
</thead>
<tbody>
<?php 
$kue = "
SELECT * FROM COUNTRY
";
$sql = $pdo->prepare($kue, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
$sql->execute();
$jum = $sql->rowCount();
?>
<tr>
	<td colspan=2>Jumlah Data : <?php echo $jum; ?></td>
</tr>
<?php
while($data = $sql->fetch()){
?>
<tr>
	<td><?php echo $data['COUNTRY']; ?></td>
	<td><?php echo $data['CURRENCY']; ?></td>
</tr>
<?php
}
?>
</tbody>
</table>
<?php
*/
?>