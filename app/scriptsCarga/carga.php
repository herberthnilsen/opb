<?php 
require_once("database-connect.php");


function insertCustomers($db, $filename){
    
    $lines = file("./carga/".$filename);
    
    foreach($lines as $line){

        $customer = explode("|", $line);
        echo '<br/> Customer ID-'.$customer[0];
        
        try{

            echo '<br/> Inserindo Customer ID-'.$customer[0];
            $products[1] = substr($products[1], 0, 20);
            $db ->prepare("INSERT INTO customers( id, name, login, password) VALUES (?,?,?,?)")
                ->execute($customer) ;
        }catch (Exception $e){
            echo "<br/>Erro ao inserir Customer ID-".$customer[0];
            echo "<br/> Erro = ". $e->getMessage();
        }

    }
}

//Insere Products
function insertProducts($db, $filename){

    $lines = file("./carga/".$filename);
    
    $stmt=$db->prepare("INSERT INTO products( id, name, description) VALUES (?,?,?)");
    // $db->beginTransaction();
    foreach($lines as $line){

        $products = explode("|", $line);
        echo '<br/> Products ID-'.$products[0];
        
        try{

            echo '<br/> Inserindo products ID-'.$products[0];
            $products[1] = substr($products[1], 0, 50);
            $stmt->execute($products) ;

        }catch (PDOException $e){
            echo "<br/>Erro ao inserir products ID-".$products[0];
            echo "<br/> Erro = ". $e->getMessage();
            die();
        }

    }
    // $db->commit();

}

//carga dos arquivos de customer e products
// $dir = opendir("./carga");

// while (false !== ($filename = readdir($dir))) {

//     if(strstr($filename, "customers")){
      
//         $echo=insertCustomers($db, $filename);
//     }elseif(strstr($filename, "products") ){
        
//         $echo =insertProducts($db, $filename);
//     }

// }

//Executar carga de 80milhoes
$lines = "";
$aux=1;
$db->beginTransaction();
$stmt=$db->prepare("INSERT INTO sales( id, product_id, customer_id) VALUES (?,?,?)");
for($i =2; $i<= 80000000; $i++){
    try{

        $data=[
            $i,
            random_int(1, 8000), //PRODUCT
            random_int(1, 2000) //CUSTOMER
        ];


        echo "ID =>".$i;
        $stmt->execute($data);
        if($aux ==1000){
                set_time_limit(300);
                $db->commit();
                $db->beginTransaction();
                $aux = 0;
        }
        $aux++;

    }catch (PDOException $e){
        echo "<br/>Erro ao inserir venda ID-".$products[0];
        echo "<br/> Erro = ". $e->getMessage();
        die();
    }
}

echo "<br/>FOI - ultimo dado =>". json_encode($data);

?>
