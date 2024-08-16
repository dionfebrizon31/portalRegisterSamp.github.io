<?php $domain = "localhost:8080/pgrp"; ?>
<?php
include "config/config.php";


?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-2">
        <div class="col-sm-4 col-xl-6">
            <!-- <div class="col-sm-12 col-xl-6"> -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-5 p-4">
                    <table class="table table-dark">
                        <thead>

                            <?php
                            require_once "config/Function.php";
                            $database = new Database();

                            // Menggunakan fungsi countRowsInTable untuk menghitung jumlah baris dalam tabel 'users'
                            $tableName = 'players';
                            $totalRows = $database->countRowsInTable($tableName, 'plogin', '1');

                            // Menampilkan jumlah baris
                            ?>
                            <h4>Online Players: <?php echo $totalRows ?></h4>

                            <thead>
                                <tr>

                                    <th scope="col">id</th>
                                    <th scope="col">Character</th>

                                    <th scope="col">level</th>

                                </tr>
                            </thead>
                        <tbody>
                            <tr>

                            </tr>

                            <tr>


                                <?php
                                $no = 1;

                                $sql = "SELECT * FROM players WHERE plogin= '1'";
                                $result = mysqli_query($con, $sql);
                                while ($d = mysqli_fetch_array($result)) {
                                    echo "<td> $no  </td>";
                                    echo "<td>" . $d['username'] . "</td>";
                                    echo "<td>" . $d['level'] . "</td>";

                                    $no++;
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <!-- <div class="col-sm-12 col-xl-6"> -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-2 p-2">
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                            <h4>My Character</h4>
                            <thead>
                                <tr>
                                    <?php
                                    $no = 1;
                                    include "config/config.php";
                                    $sql = "SELECT * FROM players WHERE ucp = '" . $_SESSION['ucp'] . "'";
                                    $result = mysqli_query($con, $sql);
                                    $d = mysqli_fetch_array($result);
                                    echo "<th scope='col'>" . $d['username'] . " :</th>";
                                    ?>

                                    <th scope="2"></th>
                                <tr></tr>


                                </tr>
                            </thead>
                        <tbody>
                            <tr>

                            </tr>

                            <tr>


                                <?php
                                $database = new Database();
                                $sql = "SELECT * FROM players WHERE ucp = '" . $_SESSION['ucp'] . "'";
                                $result = mysqli_query($con, $sql);
                                $d = mysqli_fetch_array($result);

                                // echo "<td>" . $d['level'] . "</td>";
                                // echo "<td> coming soon </td>";
                                // echo "<td>" . $d['age'] . "</td>";
                                

                                // Contoh penggunaan fungsi
                                

                                $MoneyValue = $database->decimalToDollar($d['money']);
                                $Bankvalue = $database->decimalToDollar($d['bmoney']);

                                // $no++;
                                echo "
                                <tr>
                                    <td>Level</td>
                                    <td>" . $d['level'] . "</td>
                                </tr> 
                                <tr>
                                    <td>Age</td>
                                    <td> " . $d['age'] . "</td>
                                </tr>
                                <tr>
                                    <td>Origin</td>
                                    <td>  soon  </td>
                                </tr>
                                <tr>
                                    <td>Play Time</td>
                                    <td> " . $d['hours']." Hourse, ".$d['minutes']." Minutes, ".$d['seconds']." Seconds" . "</td>
                                </tr>
                                <tr>
                                    <td>Cash</td>
                                    <td>    " . $MoneyValue . "</td>
                                </tr>
                                <tr>
                                    <td>Bank</td>
                                    <td> " . $Bankvalue . "</td>
                                </tr>
                                <tr>
                                    <td>Gold</td>
                                    <td> " . $d['gold'] . "</td>
                                </tr>
                                <tr>
                                    <td>Last Login</td>
                                    <td> " . $d['last_login'] . "</td>
                                </tr>
                                <tr>
                                    <td>Warnings</td>
                                    <td> " . $d['warn'] . " / 20 </td>
                                </tr>
                                
                                
                                
                                ";
                                ?>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
</div>
</div>
</div>