<?php

class BootstrapGrid extends BootstrapElement {
	public $id = "";
	public $class = "";
	public $cols = array();

	public function __construct($id, $class, $cols) {
		$this->id = $id;
		$this->class = $class;
		$this->cols = $cols;
	}

	public function toHtml() {
		$classes = array (
				"row",
				$this->class
			);

		$tag_content = "";
		foreach ($this->cols as $col) {
			$tag_content .= $col->toHtml();
		}

		$html = $this->tag("div", array(
				"id" => $this->id,
				"class" => $classes,
			), $tag_content);

		return $html;
	}
	
	public function render() {
		echo $this->toHtml();
	}
}

class BootstrapColumn extends BootstrapElement { 
	public $id;
	public $class;
	public $content;
	public $xs;
	public $sm;
	public $md;
	public $lg;

	public function __construct($params) {
		$this->get_params_or_default(array(
				"id" => "",
				"class" => "",
				"content" => "",
				"xs" => "",
				"sm" => "",
				"md" => "",
				"lg" => "",
			), $params);
	}

	public function toHtml() {
		$classes = array (
				!(empty($this->xs)) ? 'col-xs-' . $this->xs : null,
				!(empty($this->sm)) ? 'col-sm-' . $this->sm : null,
				!(empty($this->md)) ? 'col-md-' . $this->md : null,
				!(empty($this->lg)) ? 'col-lg-' . $this->lg : null,
				$this->class
			);

		$html = $this->tag("div", array(
				"id" => $this->id,
				"class" => $classes,
			), $this->content);

		return $html;
	}
}