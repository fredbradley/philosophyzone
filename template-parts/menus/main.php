<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
		<p class="text-center menu-instruction visible-xs">Use the menu icon above to display navigation</p>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <?php wp_nav_menu([
		    "theme_location" => 'main-menu',
		    "menu_class" => "nav navbar-nav navbar-nav-justify"
		   ]); ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
