<?php

class BootstrapButton extends BootstrapElement {
	public $id;
	public $class;
	public $type;
	public $href;
	public $tag;
	public $block;
	public $size;
	public $text;
	public $disabled;
	public $active;
	
	public function __construct($params = null) {
		$this->get_params_or_default(array(
				"id" => "",
				"class" => "",
				"type" => "primary",
				"href" => "",
				"tag" => "a",
				"block" => false,
				"size" => false,
				"text" => "",
				"disabled" => false,
				"active" => false,
			), $params);
	}

	public function toHtml() {
		$classes = array(
				"btn", 'btn-' . $this->type,
				($this->large ? "btn-lg" : ""),
				($this->block ? "btn-block" : ""),
				($this->size ? "btn-" . $this->size : "")
				($this->disabled ? "disabled" : ""),
				($this->active ? "active" : ""),
				$this->class
			);

		$attributes = array(
				"id" => $this->id,
				"class" => $classes,
				"href" => $this->href,
			);

		if ($this->disabled) {
			$attributes["disabled"] = "disabled";
		}

		if  {
			$attributes["disabled"] = "disabled";
		}

		$html = $this->tag($this->tag, $attributes, $this->text);

		return $html;
	}
}