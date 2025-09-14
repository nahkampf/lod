<?php
define('TILE_WIDTH', 5);
define('TILE_HEIGHT', 5);

require "../vendor/autoload.php";

$image = imagecreate(TILE_WIDTH * 256, TILE_HEIGHT * 256);

$result = $conn->query("SELECT map.*, terrain_types.name FROM map, terrain_types WHERE terrain_types.id = map.terrain_type ORDER BY x ASC, y ASC");
$x =1;
$y =1;
foreach($result as $row => $tile) {
    mt_srand();
    switch($tile["name"]) {
      case "Forest":
        $filename = "map_grassland_" . mt_rand(1,3) . ".gif";
      break;
      case "Grassland":
        $filename = "map_grassland_" . mt_rand(1,4) . ".gif";
      break;
      case "Desert":
        $filename = "map_desert_" . mt_rand(1,3) . ".gif";
      break;
      case "High mountain":
        $filename = "map_highmountain_" . mt_rand(1,2) . ".gif";
     break;
      case "Low mountain":
        $filename = "map_lowmountain_" . mt_rand(1,3) . ".gif";
      break;
      case "Location":
        $filename = "map_location_1.gif";
      break;
      case "Radslag":
        $filename = "map_radslag_" . mt_rand(1,3) . ".gif";
      break;
      case "Road":
        $filename = "map_road_" . mt_rand(1,3) . ".gif";
      break;
      case "Ruins":
        $filename = "map_ruins_" . mt_rand(1,2) . ".gif";
      break;
      case "Swamp":
        $filename = "map_grassland_" . mt_rand(1,3) . ".gif";
      break;
      case "Tundra":
        $filename = "map_grassland_" . mt_rand(1,3) . ".gif";
      break;
      case "Wasteland":
        $filename = "map_grassland_" . mt_rand(1,3) . ".gif";
      break;
      case "Water":
        $filename = "map_grassland_" . mt_rand(1,4) . ".gif";
      break;
    }

//echo $filename."\n";
    $tile = imagecreatefromjpeg(__DIR__ . "/images/" . $filename);
    imagecopy($image, $filename, $tile["x"] * TILE_WIDTH, $tile["y"] * TILE_HEIGHT, 0, 0, TILE_WIDTH, TILE_HEIGHT);
}
header("Content-type: image/jpeg;");
imagejpeg($image);
