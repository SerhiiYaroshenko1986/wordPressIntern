<?php
$name = $_GET['name'];
$birth_year = $_GET['birth_year'];
$birth_year = date('Y') - $birth_year;
echo json_encode(["name" => $name, "old" => $birth_year]);
