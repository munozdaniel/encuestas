<?php
/**
 * Created by PhpStorm.
 * User: dmunioz
 * Date: 02/09/2015
 * Time: 9:58
 */

class RadioGroup  extends \Phalcon\Forms\Element{
    private $checked = null;

    /**
     * @param string $elementName The checked element's name
     * @return void
     */
    public function setChecked($elementName)
    {
        $this->checked = $elementName;
    }

    /**
     * More decoration than the regular render, does similar things, Probablemente este incompleto !! D:.
     * Supported attributes:
     * string   `label`             The entire group's label
     * array    `elements`      Key, value associated array
     * string   `class`             The CSS selectors for each HTML LABEL element
     *
     * @param array $attributes Render time attributes, will override what was set earlier.
     * @return string A set of HTML radio elements.
     */
    public function render($attributes = [])
    {
        // Overrides any attribute set earlier
        if (!empty($attributes)) {
            foreach ($attributes as $key => $val) {
                $this->setAttribute($key, $val);
            }
        }

        $attr = $this->getAttributes();
        $rendered = isset($attr['label']) ? '<h3>' . $attr['label'] . '</h3>' : ''; // H3 NOT FINAL
        $cssClass = isset($attr['class']) ? ' class="'.$attr['class'].'"' : '';

        $eleName = $this->getName() . '_';

        foreach($attr['elements'] as $key => $label) {

            $checked = '';
            if ($this->checked && $this->checked == $key) {
                $checked = ' checked="true"';
            }
        //NOTA!!! : en el atributo value el valor va a ser key+1 porque en la bd las tablas siempre empiezan en 1, y no en 0.
            $rendered .= '
    <label for="'.$eleName . $key.'"'.$cssClass.'><input type="radio"'.$checked.' id="'.$eleName . $key. '" name="'.$this->getName().'" value="'.($key+1).'"> ' .
                $label . '</label>' ;
        }

        return $rendered;
    }
}