<?php

$bt = filter_input(INPUT_POST, "altdel");

if ($bt == "ALTERAR") {
	include 'altera.php';
} else {
	if ($bt == "APAGAR") {
		include 'apaga.php';
	}
}
