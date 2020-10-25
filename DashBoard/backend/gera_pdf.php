
<?php

require('conectbd.php');
$html = "<table border=1 align='center'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<td>Nome</td>";
$html .= "<td>Sobrenome</td>";
$html .= "<td>Email</td>";
$html .= "<td>Cidade</td>";
$html .= "<td>Telefone</td>";
$html .= "</tr>";
$html .= "</thead>";


$query_cliente = "SELECT * FROM clientes";
$query_cliente_resultado = mysqli_query($link, $query_cliente);
while ($row_cliente = mysqli_fetch_assoc($query_cliente_resultado)) {
    $html .= "<tbody>";
    $html .= '<tr><td>' . $row_cliente['Nome'] . "</td>";
    $html .= '<td>' . $row_cliente['Sobrenome'] . "</td>";
    $html .= '<td>' . $row_cliente['Email'] . "</td>";
    $html .= '<td>' . $row_cliente['Cidade'] . "</td>";
    $html .= '<td>' . $row_cliente['Telefone'] . "</td></tr>";
    $html .= "</tbody>";
}

$html .= '</table>';

use Dompdf\Dompdf;

require_once("dompdf/autoload.inc.php");

$dompdf = new DOMPDF();

$dompdf->load_html('
    <h1 style="text-align: center;">Doce Lar - Relatório de Clientes</h1>
    ' . $html . '
');

$dompdf->render();

$dompdf->stream(
    "relatorio_clientes.pdf",
    array(
        "Attachment" => false //Para realizar o download somente alterar para true
    )
);
