<?php

class BootstrapNavbar extends BootstrapElement {
	public $id;
	public $class;
	public $brand_text;
	public $inverse;
	public $fixed;
	public $fluid_container;
	public $inner_container;
	public $left_items;
	public $right_items;

	public function __construct($params = null) {
		$this->get_params_or_default(array(
				"id" => "",
				"class" => "",
				"brand_text" => "",
				"fixed" => false,
				"inverse" => false,
				"fluid_container" => true,
				"inner_container" => true,
				"right_items" => null,
				"left_items" => null,
			), $params);
	}


	public function toHtml($current_page) {
		$html = '<div class="navbar-header">';
		if ($this->brand_text) {
			$html .= '<a href="../" class="navbar-brand">' . $this->brand_text .'</a>';
		}
		$html .= '<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>';
		$html .= '</div>';

		$html .= '<div class="navbar-collapse collapse" id="navbar-main">';
		if ($this->left_items) {
			$html .= '<ul class="nav navbar-nav navbar-left">';
			foreach ($this->left_items as $navbar_item) {
				$html .= $navbar_item->toHtml($current_page);
			}
			$html .= '</ul>';
		}
		if ($this->right_items) {
			$html .= '<ul class="nav navbar-nav navbar-right">';
			foreach ($this->right_items as $navbar_item) {
				$html .= $navbar_item->toHtml($current_page);
			}
			$html .= '</ul>';
		}
		$html .= '</div>'; // end navbar_main

		if ($this->inner_container) {
			$html = $this->tag("div", array(
					"class" => array("container"),
				), $html);
		}

		$container = $this->tag("div", array(
				"class" => array(
						($this->fluid_container ? "container-fluid" : "container")
					),
			), $html);

		$navbar = $this->tag("div", array(
				"id" => $this->id,
				"class" => array(
						"navbar",
						($this->inverse ? 'navbar-inverse' : 'navbar-default'),
						($this->fixed ? 'navbar-fixed' : '')
					),
			), $container);

		return $navbar;
	}

	public function render($current_page) {
		echo $this->toHtml($current_page);
	}
}

class BootstrapNavbarItem extends BootstrapElement {
	public $url = "";
	public $text = "";

	public function __construct($text, $url) {
		$this->text = $text;
		$this->url = $url; 
	}

	public function toHtml($current_page) {
		$html = '<li class="' . ($current_page == $this->url ? "active" : "") . '">';
		$html .= '<a href="' . $this->url . '">' . $this->text . '</a></li>';
		return $html;
	}

	public function render($current_page) {
		echo $this->toHtml($current_page);
	}
}