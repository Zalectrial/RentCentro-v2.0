<?php

?>
<div class="row">
    <div class="col-sm-12" style="border: 2px dashed blue;">
        <h1 style="text-align:center">RENT CENTRO</h1>
    </div>
</div>

<div class="row">
	

<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="search.php">Advance Search</a></li>
    	<?php
    	if(isset($_SESSION['email'])){
    		echo'<li><a href="add_property.php">Add Property</a></li>';
    	}
    	?>
      
    </ul>
    <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search" action="search_results.php" method="get">
        <div class="input-group">
            
                <input type="text" class="form-control" placeholder="Search" name="query">
                
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </div>
            
        </div>
        </form>
    </div>
    <ul class="nav navbar-nav navbar-right">
      	<?php
			if(isset($_SESSION['email'])){
				echo'<li><a href="logout.php">Log out ('.$_SESSION['name'].')</a></li>';
			}else{
				echo'<li><a href="login.php">Log in</a></li>';
			}
    	?>
      
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
	
</div> <!-- /row -->