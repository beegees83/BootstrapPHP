<?php

class BootstrapButton extends BootstrapElement {
	public $id;
	public $class;
	public $type;
	public $href;
	public $tag;
	public $block;
	public $large;
	public $text;

	public function __construct($params = null) {
		$this->get_params_or_default(array(
				"id" => "",
				"class" => "",
				"type" => "primary",
				"href" => "",
				"tag" => "a",
				"block" => false,
				"large" => false,
				"text" => ""
			), $params);
	}

	public function toHtml() {
		$classes = array(
				"btn", 'btn-' . $this->type,
				($this->large ? "btn-lg", ""),
				($this->block ? "btn-block", ""),
				$this->class
			);

		$html = $this->tag($this->tag, array(
				"id" => $this->id,
				"class" => $classes,
				"href" => $this->href,
			), $this->text);

		return $html;
	}
}