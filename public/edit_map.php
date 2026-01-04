<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<style>

body {
  background-color: black;
}
.bright-green {
    color: var(--bright-green);
}
.bright-white {
    color: var(--bright-white);
}
.bright-blue {
    color: var(--bright-blue);
}
.bright-cyan {
    color: var(--bright-cyan);
}
.bright-magenta {
    color: var(--bright-magenta);
}
.bright-yellow {
    color: var(--bright-yellow);
}
.bright-red {
    color: var(--bright-red);
}
.bright-black {
    color: var(--bright-black);
}
.black {
    color: var(--black);
}
.blue {
    color: var(--blue);
}
.green {
    color: var(--green);
}
.cyan {
    color: var(--cyan);
}
.magenta {
    color: var(--magenta);
}
.red {
    color: var(--red);
}
.yellow {
    color: var(--yellow);
}
.white{
    color: var(--white);
}


a {
color: inherit;
text-decoration:none;
}
</style>
<script>
document.addEventListener('click', function (event) {
        if (!event.target.matches('.setTerrain')) return;
        event.preventDefault();
        var id = event.target.attributes[1].nodeValue;
        var cellID = id.substring(1);
        var terrainType = document.querySelector('#terrain_type').value;
        console.log("CellID: " + cellID + ", set to terrain type " + terrainType);
        document.querySelector('#m' + cellID).text = document.querySelector('#terrain_type').selectedOptions[0].dataset.icon.replaceAll("\\","");
        document.querySelector('#m' + cellID).className = document.querySelector('#terrain_type').selectedOptions[0].dataset.cls;
        console.log("icon: " + document.querySelector('#terrain_type').selectedOptions[0].dataset.icon);
        console.log("class: " + document.querySelector('#terrain_type').selectedOptions[0].dataset.cls);
        fetch("update_tile.php?id=" + cellID + "&ttype=" + terrainType);
}, false);


window.onload = (event) => {
};
</script>
</head>
<body>
<select name="terrain_type" id="terrain_type" style="position: fixed;">
<?php

require("db.php");
$sql = "SELECT * FROM terrain_types";
$res = $conn->query($sql);
while($row2 = $res->fetch_assoc()) {
?>
<option data-cls="<?=$row2["color_class"]?>" data-icon='<?=addslashes($row2["icon"])?>' value="<?=$row2["id"]?>"><?=$row2["name"] . " " . $row2["icon"]?></option>
<?php
}
?>
</select>
<select name="zone">
<?php
$sql = "SELECT * FROM zones ORDER BY full_name ASC";
$res = $conn->query($sql);
while($row2 = $res->fetch_assoc()) {
?>
    <option value="<?=$row2["id"]?>"><?=$row2["full_name"]?></option>
<?php
}
?>
</select>
<br>
<table>
<?php
$x = 1;
for ($c = 1; $c < 129 ; $c++) {
  $sql = "SELECT map.id, map.x, map.y, terrain_types.color_class, terrain_types.icon FROM map, terrain_types WHERE terrain_types.id = map.terrain_type AND x = $c";
  $result = $conn->query($sql);
?>
  <tr>
<?php
  while($row = $result->fetch_assoc()) {
?>
        <td class="<?=$row["color_class"]?>"><a class="setTerrain" href="#<?=$row["id"]?>" id="m<?=$row["id"]?>"><?=$row["icon"]?></a></td>
<?php
  }
?>
  </tr>
<?php
}
?>
</table>
</body>
