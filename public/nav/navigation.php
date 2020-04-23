<img src="./images/category.png" usemap="#image_map">
<map name="image_map">
  <area alt="home" href="./index.php" coords="305,39,432,100" shape="rect">
  <area alt="frozen food" href="./index.php?category_id=1" coords="10,219,136,281" shape="rect">
  <area alt="fresh food" href="./index.php?category_id=2" coords="159,220,284,280" shape="rect">
  <area alt="beverages" href="./index.php?category_id=3" coords="308,220,433,279" shape="rect">
  <area alt="home health" href="./index.php?category_id=4" coords="458,220,583,279" shape="rect">
  <area alt="pet food" href="./index.php?category_id=5" coords="605,220,730,279" shape="rect">
</map>

<?php
if (isset($category_id)) {
  include("./nav/{$category_id}.php");
}
?>