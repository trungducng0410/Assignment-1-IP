<img src="./images/category.png" usemap="#image_map">
<map name="image_map">
  <area alt="home" href="./index.php" coords="305,39,432,100" shape="rect">
  <area alt="frozen food" coords="10,219,136,281" shape="rect" onmouseover="changeNav(1)">
  <area alt="fresh food" coords="159,220,284,280" shape="rect" onmouseover="changeNav(2)">
  <area alt="beverages" coords="308,220,433,279" shape="rect" onmouseover="changeNav(3)">
  <area alt="home health" coords="458,220,583,279" shape="rect" onmouseover="changeNav(4)">
  <area alt="pet food" coords="605,220,730,279" shape="rect" onmouseover="changeNav(5)">
</map>


<div style="position:relative;">
  <div id="nav1" style="visibility: hidden; position: absolute;">
    <?php
    include("./nav/1.php");
    ?>
  </div>

  <div id="nav2" style="visibility: hidden; position: absolute;">
    <?php
    include("./nav/2.php");
    ?>
  </div>

  <div id="nav3" style="visibility: hidden; position: absolute;">
    <?php
    include("./nav/3.php");
    ?>
  </div>
  <div id="nav4" style="visibility: hidden; position: absolute;">
    <?php
    include("./nav/4.php");
    ?>
  </div>
  <div id="nav5" style="visibility: hidden; position: absolute;">
    <?php
    include("./nav/5.php");
    ?>
  </div>
</div>

<script>
  function changeNav(option) {
    var nav1 = document.getElementById('nav1');
    var nav2 = document.getElementById('nav2');
    var nav3 = document.getElementById('nav3');
    var nav4 = document.getElementById('nav4');
    var nav5 = document.getElementById('nav5');

    nav1.style.visibility = 'hidden';
    nav2.style.visibility = 'hidden';
    nav3.style.visibility = 'hidden';
    nav4.style.visibility = 'hidden';
    nav5.style.visibility = 'hidden';

    if (option == 1) {
      nav1.style.visibility = 'visible';
    } else if (option == 2) {
      nav2.style.visibility = 'visible';
    } else if (option == 3) {
      nav3.style.visibility = 'visible';
    } else if (option == 4) {
      nav4.style.visibility = 'visible';
    } else if (option == 5) {
      nav5.style.visibility = 'visible';
    }
  }

  const queryString = window.location.search;

  const urlParams = new URLSearchParams(queryString);

  const category = urlParams.get('category_id');

  changeNav(category);
</script>