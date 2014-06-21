#Bootstrap.php: Hyper-rapid development

Spend less time writing HTML and more time developing. Still working on developing the docs so bare with me.

##Carousel Example
	$slides = array(
				new BootstrapCarouselSlide(array(
					"image" => "/images/slides/1.jpg",
					"text" => "Some HTML")),
				new BootstrapCarouselSlide(array(
					"image" => "/images/slides/2.jpg",
					"text" => "Some HTML")),
				new BootstrapCarouselSlide(array(
					"image" => "/images/slides/3.jpg",
					"text" => "Some HTML")),
			);

	$carousel = new BootstrapCarousel(array(
		"id" => "some-slider", // carousel ID
		"slides" => $slides, // array of BootstrapCarouselSlide
		"interval" => 7500 // speed of carousel changes
		));

	$carousel->render();

###Navbar Example
	$navbar_items = array( // BootstrapNavbarItem(Page Title, Current Page)
						new BootstrapNavbarItem("Home", "/?page=home"),
						new BootstrapNavbarItem("About Us", "/?page=about-us"),
						new BootstrapNavbarItem("Services", "/?page=services"),
						new BootstrapNavbarItem("Contact Us", "/?page=contact-us"),
					);

	$navbar = new BootstrapNavbar(array(
									"brand_text" => "My Company", 
									"id" => "main-navbar",
									"class" => "",
									"fixed" => false, // add navbar-fixed
									"inverse" => true, // add navbar-inverse
									"fluid_container" => true, // navbar is full-width
									"inner_container" => true, // navbar > ul is inside a container
									"left_items" => $navbar_items, // navbar-left links 
									"right_items" => null // navbar-right links
		));

	$navbar->render($current_page); // pass current page

###Panel Example
	$panel = new BootstrapPanel(array(
		"id" => "panel-id", 
		"class" => "panel-class", 
		"type" => "default", // primary, success, info, etc.
		"title" => "Panel Title", 
		"content" => $content));

	$panel->render();

###Grid Example
	$columns = array();

	array_push($columns, new BootstrapColumn(array(
				"content" => "Some HTML",
				"xs" => 12,	// col-xs-
				"sm" => 6,	// col-sm-
				"md" => 3,	// col-md-
				"lg" => 1,	// col-lg-
				)));

	$grid = new BootstrapGrid("grid-id", "grid-class", $columns);
	$grid->render();