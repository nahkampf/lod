<?php
require "db.php";

$conn->query("UPDATE map SET terrain_type=". (int)$_GET["ttype"] . " WHERE id=" . (int)$_GET["id"] . " LIMIT 1");
