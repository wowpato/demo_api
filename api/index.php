<?php
/**
 * Created by PhpStorm.
 * User: wowpa
 * Date: 28/06/2018
 * Time: 1:39
 */

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
try{
    include 'conector.php';
    $method_name=$_SERVER["REQUEST_METHOD"];
    if($method_name)
    {
        switch ($method_name)
        {
            case 'GET':

                $qry="SELECT * from item";
                $result=mysqli_query($conn, $qry);
                while ($row=mysqli_fetch_row($result)){
                    $temp_cat[]=array("item_id"=>$row[0],"item_name"=>$row[1],"item_description"=>$row[2],"item_size"=>$row[3],"item_cost"=>$row[4]);
                }
                $data=array("status"=>"1","message"=>"success","result"=>$temp_cat);
                break;
            case 'POST':
                if(isset($_REQUEST['item_name'])&&isset($_REQUEST['item_description'])&&isset($_REQUEST['item_size'])&&isset($_REQUEST['item_cost'])) {
                    $item_name          =$_REQUEST['item_name'];
                    $item_description   =$_REQUEST['item_description'];
                    $item_size          =$_REQUEST['item_size'];
                    $item_cost          =$_REQUEST['item_cost'];
                    $qry="INSERT INTO item(item_name,item_description,item_size,item_cost) values('$item_name','$item_description','$item_size','$item_cost')";
                    if(mysqli_query($conn, $qry))
                    {
                        $data=array("status"=>"1","message"=>"Success","result"=>"Item agregado correctamente");
                    }
                    else{
                        $data=array("status"=>"0","message"=>"Warning","result"=>"Algo salio mal... lo siento!!!");
                    }
                } else {
                    $data = array("status" => "0", "message" =>"Error", "result" => "Las variables parecen no ser validas!!!");
                }
                break;
            case 'PUT':
                $request_parseado = explode('/', $_SERVER['REQUEST_URI']);
                $item_id = 		$request_parseado[2];
                $item_name = 		urldecode($request_parseado[3]);
                $item_description = 	urldecode($request_parseado[4]);
                $item_size = 		urldecode($request_parseado[5]);
        	$item_cost = 		$request_parseado[6];
                if(isset($item_id)&&isset($item_name)&&isset($item_description)&&isset($item_size)&&isset($item_cost)) {
                    $qry = "UPDATE item SET item_name='" . $item_name . "', item_description='" . $item_description . "',item_size='" . $item_size . "', item_cost='$item_cost' where item_id='" . $item_id . "' ";
                    if (mysqli_query($conn, $qry)) {
                        $data = array("status" => "1", "message" => "Success", "result" => "Producto actualizado");
                    } else {
                        $data = array("status" => "0", "message" => "Warning", "result" => "Algo salio mal... lo siento!!!");
                    };
                } else {
                    $data = array("status" => "0", "message" => "Error", "result" => "Las variables parecen no ser validas!!!");
                };
                break;
            case 'DELETE':
                $request_parseado = explode('/', $_SERVER['REQUEST_URI']);
                $item_id = $request_parseado[2];
                if(isset($item_id)) {
                    $qry="delete from item where item_id='".$item_id."'";
                    if(mysqli_query($conn, $qry))
                    {
                        $data=array("status"=>"1","message"=>"Success","result"=>"Producto eliminado correctamente");
                    }
                    else{
                        $data=array("status"=>"0","message"=>"Warning","result"=>"Algo salio mal... lo siento!!!");
                    }
                } else {
                    $data = array("status" => "0", "message" => "Error", "result" => "Las variables parecen no ser validas!!!");
                }
                break;
        }
        echo json_encode($data);
    }
    else{
        $data=array("status"=>"0","message" => "Error","result"=>"El metodo ingresado no parece ser correcto!! ");
	echo json_encode($data);
    }
}
catch(Exception $e) {
    echo 'Excpection capturarda: ',  $e->getMessage(), "\n";
}

