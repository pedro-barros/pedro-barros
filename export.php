<?php
include('conn_offline.php');
// include('conn_online.php');

$output = ''; {
    $sql = "SELECT lojas_agriloja.localizacao_loja as loja,shopping.cod_barras,shopping.concorrente,shopping.cabaz,shopping.pvp_normal,shopping.pvp_promo,shopping.data_recolha,shopping.observacoes,users.nome,artigos.descricao_artigo,area.descricao_area,artigos.ref_artigo,artigos.euros ,artigos.centimos , IF(cabaz = 1, 'sazonal', 'permanente')as cabaz FROM artigos INNER JOIN shopping ON artigos.cod_barras=shopping.cod_barras JOIN users ON shopping.user_id=users.id JOIN lojas_agriloja ON shopping.loja=lojas_agriloja.localizacao_loja JOIN area ON artigos.id_area=area.id_area ORDER BY loja";

    $select = mysqli_query($conn, $sql);
    if (mysqli_num_rows($select) > 0) {
        $output .= '<table class="table" border="1">
        <tr>
        <th>Loja</th>
          <th>Concorrente</th>
          <th>Area</th>
          <th>Artigo</th>
          <th>Referencia artigo</th>
          <th>EAN</th>
          <th>Cabaz</th>
          <th>Preco Agriloja</th>
          <th>PVP Normal</th>
          <th>PVP Promo</th>
          <th>Observacoes</th>
          <th >Data Recolha</th>
          <th>Funcionario</th>
          </tr>
        ';
        while ($row = mysqli_fetch_array($select)) {
            $output .= '<tr> ' . '  
            <td>' . $row["loja"] . '</td>' . '
            <td>' . $row["concorrente"] . '</td>' . '
            <td>' . $row["descricao_area"] . '</td>' . '
            <td>' . $row["descricao_artigo"] . '</td>' . '
            <td>' . $row["ref_artigo"] . '</td>' . 
            
            '<td>' . $row["cod_barras"] . '</td>' . 

            '<td>' . $row["cabaz"] . '</td>' . '
            <td>' . $row['euros'] . "." . $row['centimos'] . '</td>' . '
            <td>' . $row["pvp_normal"] . '</td>' . '
            <td>' . $row["pvp_promo"] . '</td>' . '
            <td>' . $row["observacoes"] . '</td>' . '
            <td>' . $row["data_recolha"] . '</td>' . '
            <td>' . $row["nome"] . '</td>' . ' </tr>';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=shopping.xls");
        echo $output;
    }
}

//insert na tabela de historicos.

$copyQuerry = "INSERT INTO historicos_shopping(`id_shopping`, `cod_barras`, `concorrente`,`loja`, `cabaz`,`pvp_normal`, `pvp_promo`, `data_recolha`,`observacoes`,`user_id`) SELECT id_shopping , cod_barras , concorrente , loja , cabaz , pvp_normal , pvp_promo , data_recolha , observacoes , user_id FROM shopping";
$copy = mysqli_query($conn, $copyQuerry);

$deleteQuery = "DELETE from shopping";
$delete = mysqli_query($conn, $deleteQuery);
