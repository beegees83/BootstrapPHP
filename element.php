<?php
class BootstrapElement {
	protected function get_params_or_default($param_default, $params) {
		if (!empty($params)) {
			foreach ($param_default as $param_name => $default) {
				$param_name = trim($param_name);
				$this->$param_name = $this->value_or_default($params, $param_name, $default);
			}
		}
	}

	protected function value_or_default($array, $key, $default) {
		return (isset($array[$key]) ? $array[$key] : $default);
	}

	protected function generate_attr($attribute, $values) {
		$html = $attribute . '="';
		foreach ($values as $value) {
			if (!empty($value)) {
				$html .= $value . " ";
			}
		}

		$returnval = ($html == $attribute . '="') ? "" : trim($html) . '"';

		return $returnval;
	}

	protected function tag($tag_name, $attr_vals, $content = null) {
		$html = '<' . $tag_name . ' ';

		foreach ($attr_vals as $attribute => $value) {
			$attr_html = $this->generate_attr(
						$attribute, 
						($attribute == "class" ? $value : array($value))
					);

			if ($attr_html != "") {
				$html .= $attr_html . " ";
			}
		}
		$html = trim($html) . '>';

		if ($content != null) {
			$html .= $content . '</' . $tag_name . '>';
		}

		return $html;
	}

	public function render() {
		echo $this->toHtml();
	}
}