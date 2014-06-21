<?php

class BootstrapPanel extends BootstrapElement {
	public $id;
	public $class;
	public $type;
	public $title;
	public $content;

	public function __construct($params) {
		$this->get_params_or_default(array(
				"id" => "",
				"class" => "",
				"type" => "default",
				"title" => "",
				"content" => "",
			), $params);
	}

	public function toHtml() {
		$classes = array(
				"panel", 'panel-' . $this->type,
				$this->class
			);

		$tag_content = '<div class="panel-heading"><h3 class="panel-title">' . $this->title . '</h3></div>';
		$tag_content .= '<div class="panel-body">' . $this->content . '</div>';
		$html = $this->tag("div", array(
				"id" => $this->id,
				"class" => $classes,
			), $tag_content);

		return $html;
	}
}