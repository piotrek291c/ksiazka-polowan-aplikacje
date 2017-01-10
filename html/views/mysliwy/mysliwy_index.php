<h1>Lista Myśliwych</h1>
<br />
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Login</th><th>Hasło</th><th>Email</th><th>Imię</th><th>Nazwisko</th><th>Numer pozwolenia</th><th>Data urodzenia</th>                                                                  
        </tr>
        <?php
        foreach ($results as $row) {
            echo '<tr>';
            echo "<td>".$row['login']."</td>";
            echo "<td>".$row['haslo']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['Imie']."</td>";
            echo "<td>".$row['Nazwisko']."</td>";
            echo "<td>".$row['Numer_pozwolenia']."</td>";
            echo "<td>".$row['Data_urodzenia']."</td>";
            echo '<td><a class="btn btn-info" href="mysliwy/edit/' . $row['idMysliwy'] . '">Edytuj</a></td>';
            echo '<td><a class="btn btn-info" href="mysliwy/delete/' . $row['idMysliwy'] . '">Usuń</a></td>';
            echo '</tr>';
        }
        ?>
    </table>

</div>
<a class="btn btn-info" href="mysliwy/add">Dodaj</a>
