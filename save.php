<?php
error_reporting(E_ALL);
include 'config.php';

if(isset($_POST['count']) && $_POST['count'] > 0)
{




	$stmt = $pdo->prepare("INSERT into venue values(NULL,:venue,:count)");
	$stmt->bindParam(':venue', $_POST['amount'], PDO::PARAM_STR);    
	$stmt->bindParam(':count', $_POST['item'], PDO::PARAM_INT);    
	$stmt->execute();
	 
 
$response_array['status'] = 'success';  
}
else
{
	 $response_array['status'] = 'error';  
}  


header('Content-type: application/json');
echo json_encode($response_array);

?>