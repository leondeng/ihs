<?php
class sfWidgetFormSchemaFormatterIhs extends sfWidgetFormSchemaFormatter
{
  protected $position = 0;
  protected $renderedPosition = 0;
  
  protected
    $rowFormat       = '<div class="%row_classes%">%label%<div class="%field_classes%"><div class="control">%field%</div>%error%</div>%help%%hidden_fields%<div class="clear"></div></div>',
    $errorRowFormat  = '%errors%',
    $helpFormat      = '<small style="position: absolute; right: 0;"><span class="formhelp icon inlinehelp icon-help {key: \'%help_key%\'}"></span>%help%</small>',
    $decoratorFormat = '%content%',
    $errorRowFormatInARow      = '    <li>%error%</li>',
    $namedErrorRowFormatInARow = '    <li>%name%: %error%</li>';

  public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null) {
    $this->renderedPosition++;
    $schema = $this->getWidgetSchema();

    $name = ($label instanceOf ihsFormLabel) ? $label->getName() : null;
    
    $widget = $schema[$name];
  	
    $widget->setIdFormat($schema->getOption('id_format'));
    $id = $widget->generateId($name);

    if ($widget instanceOf sfWidgetFormSchemaDecorator) {
      $fieldClasses = $type = $class = 'form';
    } else {
      if ($widget instanceof sfWidgetFormSchema) {
        $label = sprintf('<span class="label">%s</span>', $label);
      }
      $fieldClasses = 'field';
      $fieldClasses .= (strpos($field, '<textarea') !== false) ? ' full' : '';
      preg_match('/\<([a-z]+)[^>]*?id\=\"(.*?)\"/i', $field, $matches);
      $type = isset($matches[1]) ? $matches[1] : 'unknown';
      $id = isset($matches[2]) ? str_replace('-', '_', Doctrine_Inflector::urlize($matches[2])) : 'unknown';
      $class = str_replace('sfWidgetForm', '', get_class($widget));
  	}
  	
  	$rowClasses = $widget->getOption('row_classes');
    
    return strtr($this->getRowFormat(), array(
      '%label%'         => $label,
      '%field%'         => $field,
      '%error%'         => $this->formatErrorsForRow($errors),
      '%help%'          => $this->formatHelp($help, $id),
      '%hidden_fields%' => null === $hiddenFields ? '%hidden_fields%' : $hiddenFields,
      '%field_classes%' => $fieldClasses,
      '%row_classes%' => strtolower(sprintf('row row_type_%s row_for_%s row_item_%s row_widget_%s row_num_%d %s', $type, $id, $name, $class, $this->renderedPosition, $rowClasses))
    ));
  }

  /**
   * sfWidgetFormSchemaFormatterDiv::formatHelp()
   *
   * Format the help icon including a special "help key" which is a unique (not always) identifier
   *
   * @param unknown_type $help
   * @param unknown_type $name
   * @param unknown_type $form
   * @return string
   * @see sfWidgetFormSchemaFormatter::formatHelp()
   * @author David Mann <ninja@codingninja.com.au>
   */
  public function formatHelp($help, $name = '') {
    return strtr($this->getHelpFormat(), array('%help%' => $this->translate((string) $help), '%help_key%' => $name));
  }
  
  /**
   * sfWidgetFormSchemaFormatterDiv::generateLabel()
   * 
   * Generates a label for the given field name and encodes it as mctFormLabel.
   * 
   * @param unknown_type $name
   * @param unknown_type $attributes
   * @see sfWidgetFormSchemaFormatter::generateLabel()
   * @return mctFormLabel  The mctFormLabel instance containing the label
   * 
   * @author Andre Wyrwa <andre.wyrwa@momentumcloud.com.au>
   */
  public function generateLabel($name, $attributes = array()) {
    if (false === $labelName = parent::generateLabelName($name)) return $this->_encodeLabel($name, '');
    
    if (!isset($attributes['for'])) {
      $attributes['for'] = $this->widgetSchema->generateId($this->widgetSchema->generateName($name));
    }

    $label = $this->widgetSchema->renderContentTag('label', $labelName, $attributes);
    
    return $this->_encodeLabel($name, $label);
  }
  
  /**
   * sfWidgetFormSchemaFormatterDiv::generateLabelName()
   * 
   * Generates the label name for the given field name and encodes it as mctFormLabel.
   * 
   * If the according widget is an instance of sfWidgetFormSchemaDecorator,
   * that is if it refers to an embedded form, the label name is wrapped into an according span.
   *
   * @param  string $name  The field name
   * @see sfWidgetFormSchemaFormatter::generateLabelName()
   * @return mctFormLabel  The mctFormLabel instance containing the label (name)
   * 
   * @author Andre Wyrwa <andre.wyrwa@momentumcloud.com.au>
   */
  public function generateLabelName($name) {
    if (false === $labelName = parent::generateLabelName($name)) return $this->_encodeLabel($name, '');
    
    if ($labelName === '_nolabel') return $this->_encodeLabel($name, '');
    
    $widget = $this->widgetSchema[$name];
    $label = ($widget instanceof sfWidgetFormSchemaDecorator) ? sprintf('<span class="formLabel">%s</span>', $labelName) : $labelName;
    
    return $this->_encodeLabel($name, $label);
  }
  
  /**
   * sfWidgetFormSchemaFormatterDiv::_encodeLabel()
   * 
   * Encode a label (and name) as mctFormLabel.
   * 
   * @param string $name  The field name
   * @param string $label  The label
   * @return mctFormLabel  The encoded label
   * 
   * @author Andre Wyrwa <andre.wyrwa@momentumcloud.com.au>
   */
  protected function _encodeLabel($name, $label) {
    return new ihsFormLabel($label, $name);
  }
  
  /**
   * sfWidgetFormSchemaFormatterDiv::_decodeLabel()
   * 
   * Decode an mctFormLabel.
   * 
   * @param mctFormLabel $label  The mctFormLabel instance
   * @return array  An array containing the field name as first index, the label as second index
   * 
   * @author Andre Wyrwa <andre.wyrwa@momentumcloud.com.au>
   */
  protected function _decodeLabel($label) {
    if ($label instanceof ihsFormLabel) return array($label->getName(), $label->getLabel());
    
    return array(null, $label);
  }
  
}
