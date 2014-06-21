<?php
class BootstrapCarousel extends BootstrapElement {
	public $id;
	public $class;
	public $slides;
	public $interval;

	public function __construct($params = null) {
		$this->get_params_or_default(array(
				"id" => "",
				"class" => "",
				"slides" => array(),
				"interval" => 5000,
			), $params);
	}

	public function toHtml() {
		$number_of_slides = count($this->slides);

		$classes = array(
				"carousel", "slide",
				$this->class
			);

		$html = '<ol class="carousel-indicators">';

		for ($i=0; $i < $number_of_slides; $i++) { 
			$html .= '<li data-target="#' . $this->id . '"';
			$html .= ' data-slide-to="' . $i . '" class="' . ($i == 0 ? 'active' : '') . '"></li>';
		}

		$html .= '</ol>';

		$html .= '<div class="carousel-inner">';
		for ($i=0; $i < $number_of_slides; $i++) { 
			$html .= $this->slides[$i]->toHtml($i == 0);
		}
		$html .= '</div>';

		$html .= '<a class="left carousel-control" href="#' . $this->id . '" data-slide="prev">';
		$html .= '<span class="glyphicon glyphicon-chevron-left"></span>';
		$html .= '</a>';
		$html .= '<a class="right carousel-control" href="#' . $this->id . '" data-slide="next">';
		$html .= '<span class="glyphicon glyphicon-chevron-right"></span>';
		$html .= '</a>';

		$html = $this->tag("div", array(
				"id" => $this->id,
				"class" => $classes,
				"data-ride" => "carousel",
				"data-interval" => $this->interval,
			), $html);

		return $html;
	}
}

class BootstrapCarouselSlide extends BootstrapElement {
	public $id;
	public $class;
	public $image;
	public $text;

	public function __construct($params = null) {
		$this->get_params_or_default(array(
				"id" => "",
				"class" => "",
				"image" => "",
				"text" => "",
			), $params);
	}

	public function toHtml($set_active) {
		$classes = array(
				($set_active ? 'active' : ''),
				$this->class,
				"item"
			);
		
		$tag_html = '<img src="' . $this->image . '" alt="">';
		if (!empty($this->text)) {
			$tag_html .= '<div class="carousel-caption">' . $this->text . '</div>';
		}

		$html = $this->tag("div", array(
				"id" => $this->id,
				"class" => $classes,
			), $tag_html);

		return $html;
	}

	public function render($set_active) {
		echo $this->toHtml($set_active);
	}
}