<?php
class BootstrapForm extends BootstrapElement {
	public $id;
	public $class;
	public $fields;
	public $horizontal;
	public $inline;

	public function __construct($params = null) {
		$this->get_params_or_default(array(
				"id" => "",
				"class" => "",
				"fields" => array(),
				"horizontal" => false,
				"inline" => false,
			), $params);
	}

	public function toHtml() {
		$classes = array(
				($this->inline ? "form-inline" : ""),
				($this->horizontal ? "form-horizontal" : ""),
				$this->class
			);

		$attributes = array(
				"id" => $this->id,
				"class" => $classes,
				"role" => "form",
			);

		$content_html = "";

		foreach ($this->fields as $field) {
			$content_html .= $field->toHtml();
		}

		$html = $this->tag("form", $attributes, $content_html);

		return $html;
	}
}

class BootstrapFormField extends BootstrapElement {
	public $id;
	public $class;
	public $name;
	public $container_id;
	public $container_class;
	public $type;
	public $label;
	public $label_class;
	public $attributes;
	public $disabled;
	public $active;

	public function __construct($params = null) {
		$this->get_params_or_default(array(
				"id" => "",
				"class" => "",
				"name" => "",
				"container_id" => "",
				"container_class" => "",
				"type" => "",
				"label" => "",
				"label_class" => "",
				"attributes" => array(),
				"disabled" => false,
				"active" => false,
			), $params);
	}

	public function toHtml() {
		$add_form_control = $this->type != "radio" &&
							$this->type != "checkbox" && 
							$this->type != "submit" && 
							$this->type != "reset"; 

		$add_btn = $this->type == "submit" ||
					$this->type == "reset"; 

		$classes = array(
				($add_form_control ? "form-control" : ""),
				($add_btn ? "btn" : ""),
				($this->disabled ? "disabled" : ""),
				($this->active ? "active" : ""),
				$this->class
			);

		$this->attributes["id"] = $this->id;
		$this->attributes["type"] = $this->type;
		$this->attributes["name"] = $this->name;
		$this->attributes["class"] = $classes;

		if ($this->disabled) {
			$this->attributes["disabled"] = "disabled";
		}

		$input_html = $this->tag("input", $this->attributes);

		$container_attributes = array(
				"id" => $this->container_id,
				"class" => array(
						"form-group",
						$this->container_class,
					),
			);

		if ($this->type == "radio" || $this->type == "checkbox") {
			$label_html = $this->tag("label", 
							array(
								"class" => $this->label_class,
								"for" => $this->id
								), 
							$input_html . " " . $this->label
						);

			return $this->tag("div", 
							$container_attributes, 
							$this->tag("div", 
									array("class" => "checkbox"), 
									$label_html
								)
						);
		}
		else {
			$label_html = $label_html = empty($this->label) ? "" : 
							$this->tag("label", 
								array(
									"class" => array($this->label_class)
								), 
								$this->label
							);

			return $this->tag("div", 
							$container_attributes, 
							$label_html . $input_html
						);
		}

		return $html;
	}
}