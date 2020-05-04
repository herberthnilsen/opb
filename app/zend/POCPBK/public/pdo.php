<?php 

$db = new PDO("oci:dbname=dbpjb_high;charset=utf8", "atpc_user", "0Teste123#456789");

$qtdRegistros = 10;
$timestamp = (int) (microtime(true) * 1000);

$result =$db->query('select * from atpc_user.sales  where rownum <= '.$qtdRegistros);

$timestampFinalConsulta = (int) (microtime(true) * 1000);

foreach($result as $row) {
    echo json_encode($row);
    echo "<br/>";
}
$timestampProcessamentoFinal = (int) (microtime(true) * 1000);

echo 'Qtd Registros='.$qtdRegistros.
'<br/>Timestamp Consulta ='.($timestampFinalConsulta-$timestamp).
'ms<br/> TimeStamp Final Processamento = '.($timestampProcessamentoFinal-$timestamp).'ms';
?>
