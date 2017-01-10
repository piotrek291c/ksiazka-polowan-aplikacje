<h1>Lista Zwierzyny</h1>
<br />
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Nazwa</th><th>Okres ochronny</th><th>Sezon polowań</th><th>ilość</th>                                                                
        </tr>
        <?php
        foreach ($results as $row) {
            echo '<tr>';
            echo "<td>".$row['Nazwa']."</td>";
            echo "<td>".$row['Okres_ochronny']."</td>";
            echo "<td>".$row['Sezon_polowan']."</td>";
            echo "<td>".$row['ilosc']."</td>";
            echo '<td><a class="btn btn-info" href="zwierzyna/edit/' . $row['idZwierzyna'] . '">Edytuj</a></td>';
            echo '<td><a class="btn btn-info" href="zwierzyna/delete/' . $row['idZwierzyna'] . '">Usuń</a></td>';
            echo '</tr>';
        }
        ?>
    </table>

</div>
<a class="btn btn-info" href="zwierzyna/add">Dodaj</a>
