<?php $domain = "localhost:8080/pgrp";


?>


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-50 p-4">
        <table class="table table-dark">
            <thead>
                <h4>Karakter PG:Roleplay</h4>
                <thead>
                    <tr>

                        <th scope="col">id</th>
                        <th scope="col">nama</th>

                        <th scope="col">level</th>
                        <th scope="col">asal</th>
                        <th scope="col">kelamin</th>
                        <th scope="col">status</th>
                    </tr>
                </thead>
            <tbody>
                <tr>

                </tr>

                <tr>


                    <?php
                    $no = 1;
                    include "config/config.php";
                    $sql = "SELECT * FROM players WHERE ucp = '" . $_SESSION['ucp'] . "'";
                    $result = mysqli_query($con, $sql);
                    while ($d = mysqli_fetch_array($result)) {
                        echo "<tr><td> $no  </td>";
                        echo "<td>" . $d['username'] . "</td>";
                        echo "<td>" . $d['level'] . "</td>";
                        echo "<td> coming soon </td>";
                        echo "<td>" . $d['age'] . "</td>";
                        if ($d['characterstory'] == 1) {
                            echo "<td> Sudah </td>";
                        } else {
                            echo "<td>belum</td>";

                        }
                        echo"</tr>";

                        $no++;
                    }
                    ?>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Create Karakter
        </button>

    </div>
</div>
<!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal " id="myModal">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-secondary">

            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title">
                    <h7>Buat Karakter Here</h7>
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="bg-secondary">
                    <div class="shape"></div>
                    <div class="shape"></div>
                </div>
                
                <form class="formku" method="post" action="index.php?page=pgrp-createacc">

                    <div class="mb-3">
                        <label for="email" class="form-label">Nick Name</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Masukkan Nama Character" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                        <input class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal Lahir"
                            required>

                        <script>
                            $('#tanggal').datepicker({
                                uiLibrary: 'bootstrap5'
                            });
                        </script>
                    </div>

                    <div class="mb-3">
                        <label for="Gender" class="form-label">Gender</label>
                        <select class="form-select mb-3"  name="Genderku" aria-label="Default select example" id="genderSelect">
                            <option value="">Select Gender...</option>
                            <option value="Male">Male / Laki-Laki</option>
                            <option value="Female">Female / Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3" id="maleSkinSelect" style="display:none;">
                        <label for="skinMale" class="form-label">Skin Karakter (Male)</label>
                        <select class="form-select mb-3"  name="skinMale" aria-label="Default select example" id="itemSelectMale"
                            name="itemSelectMale" onchange="showImage('Male')">
                            <option value="">Pilih...</option>
                            <option value="1">Item 1</option>
                            <option value="2">Item 2</option>
                            <option value="3">Item 3</option>
                            <option value="4">Item 4</option>
                            <option value="5">Item 5</option>
                            <option value="6">Item 6</option>
                            <option value="7">Item 7</option>
                            <option value="14">Item 14</option>
                            <option value="100">Item 100</option>
                            <option value="299">Item 299</option>
                        </select>
                    </div>

                    <div class="mb-3" id="femaleSkinSelect" style="display:none;">
                        <label for="skinFemale" class="form-label">Skin Karakter (Female)</label>
                        <select class="form-select mb-3"  name="skinFemale" aria-label="Default select example" id="itemSelectFemale"
                            name="itemSelectFemale" onchange="showImage('Female')">
                            <option value="">Pilih...</option>
                            <option value="9">Item 9</option>
                            <option value="10">Item 10</option>
                            <option value="11">Item 11</option>
                            <option value="12">Item 12</option>
                            <option value="13">Item 13</option>
                            <option value="31">Item 31</option>
                            <option value="38">Item 38</option>
                            <option value="39">Item 39</option>
                            <option value="40">Item 40</option>
                            <option value="41">Item 41</option>
                        </select>
                    </div>

                    <div id="imageDisplay">
                        <img id="selectedImage" src="" alt="Selected Image" style="display:none; max-width: 200px;">
                    </div>


                    <!-- Include jQuery and Bootstrap JS for the datepicker (if necessary) -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script
                        src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

                    <script>
                        document.getElementById('genderSelect').addEventListener('change', function () {
                            var selectedGender = this.value;
                            var maleSkinSelect = document.getElementById('maleSkinSelect');
                            var femaleSkinSelect = document.getElementById('femaleSkinSelect');
                            var imageElement = document.getElementById("selectedImage");

                            if (selectedGender === 'Male') {
                                maleSkinSelect.style.display = 'block';
                                femaleSkinSelect.style.display = 'none';
                                imageElement.style.display = "none";
                            } else if (selectedGender === 'Female') {
                                femaleSkinSelect.style.display = 'block';
                                maleSkinSelect.style.display = 'none';
                                imageElement.style.display = "none";
                            } else {
                                maleSkinSelect.style.display = 'none';
                                femaleSkinSelect.style.display = 'none';
                                imageElement.style.display = "none";
                            }
                        });

                        function showImage(gender) {
                            var selectBox = gender === 'Male' ? document.getElementById("itemSelectMale") : document.getElementById("itemSelectFemale");
                            var selectedValue = selectBox.options[selectBox.selectedIndex].value;

                            var imageElement = document.getElementById("selectedImage");

                            if (selectedValue) {
                                imageElement.src = "asset/img/skin/" + selectedValue + ".png";  // Replace with actual image path
                                imageElement.style.display = "block";
                            } else {
                                imageElement.style.display = "none";
                            }
                        }
                    </script>



                    <div class="btnku">

                        <!-- <input class="fb" type="submit" value="Login"> -->

                    </div>
                    <div class="btnku">
                        <input class="btn btn-success m-2" type="submit" value="Log in">
                        <a class="btn btn-light m-2" href="./index.php?page=register" type="button"
                            class="btn btn-secondary">Register</a>
                    </div>
            </div>
            </form>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<style>
    #gambar {
        display: none;
    }
</style>