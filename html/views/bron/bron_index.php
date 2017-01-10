<h1>Lista Broni</h1>
<br />
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Numer broni</th><th>Kaliber</th><th>Nazwa broni</th><th>Rodzaj broni</th>                                                                
        </tr>
        <?php
        foreach ($results as $row) {
            echo '<tr>';
            echo "<td>".$row['Numer_broni']."</td>";
            echo "<td>".$row['Kaliber']."</td>";
            echo "<td>".$row['Nazwa_broni']."</td>";
            echo "<td>".$row['Rodzaj_broni']."</td>";
            echo '<td><a class="btn btn-info" href="bron/edit/' . $row['idBron'] . '">Edytuj</a></td>';
            echo '<td><a class="btn btn-info" href="bron/delete/' . $row['idBron'] . '">Usuń</a></td>';
            echo '</tr>';
        }
        ?>
    </table>

</div>
<a class="btn btn-info" href="bron/add">Dodaj</a>
