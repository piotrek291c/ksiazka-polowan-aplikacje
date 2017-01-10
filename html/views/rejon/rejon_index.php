<h1>Lista Rejonów</h1>
<br />
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Miejscowość</th><th>Obwód łowiecki</th><th>Nazwa łowiska</th><th>idMysliwy</th>                                                                
        </tr>
        <?php
        foreach ($results as $row) {
            echo '<tr>';
            echo "<td>".$row['Miejscowosc']."</td>";
            echo "<td>".$row['Obwod_lowiecki']."</td>";
            echo "<td>".$row['Nazwa_lowiska']."</td>";
            echo "<td>".$row['Mysliwy_idMysliwy']."</td>";
            echo '<td><a class="btn btn-info" href="rejon/edit/' . $row['idRejon'] . '">Edytuj</a></td>';
            echo '<td><a class="btn btn-info" href="rejon/delete/' . $row['idRejon'] . '">Usuń</a></td>';
            echo '</tr>';
        }
        ?>
    </table>

</div>
<a class="btn btn-info" href="rejon/add">Dodaj</a>
