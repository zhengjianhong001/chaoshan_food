<?php 
 	require ('../mysql_connect.php');
  	require('../models/users.php');
    require('../models/cookbook.php');
  if (isset($_GET['food_id'])) {
  	 include('../views/user/recipe.html.php');
  }

 ?>

 