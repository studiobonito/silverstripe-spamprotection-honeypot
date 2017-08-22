<?php namespace StudioBonito\SilverStripe\SpamProtection\Honeypot\FormField;

use FormField;

class HoneypotField extends \HiddenField
{
    /**
     * The number of seconds before you can submit a valid request.
     *
     * @var int
     * @config
     */
    private static $time_limit = 5;

    /**
     * Reject the field if the honeypot has been filled or if the form has been submitted to quickly.
     *
     * @param $validator
     *
     * @return bool
     */
    public function validate($validator)
    {
        $timeLimit = $this->config()->time_limit;

        $timestamp = $this->getForm()->getController()->getRequest()->postVar($this->getName() . '_Timestamp');

        if (!empty($this->value) || ($timeLimit > 0 && ($timestamp + $timeLimit) > time())) {
            $validator->validationError(
                $this->name,
                _t(
                    'HoneypotField.SPAM',
                    'Your submission has been rejected because it was treated as spam.'
                ),
                'error'
            );

            return false;
        }

        return true;
    }

    /**
     * Override the Type to remove the class namespace.
     *
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function Type()
    {
        return 'honeypotspamprotector';
    }

    /**
     * Override the Field to add the Captcha and Timestamp fields.
     *
     * @codeCoverageIgnore
     *
     * @param array $properties
     *
     * @return string
     */
    public function Field($properties = array())
    {
        return $this->createHoneypotField() . $this->createTimestampField();
    }

    /**
     * Create the Captcha Field.
     *
     * @codeCoverageIgnore
     *
     * @return string
     */
    protected function createHoneypotField()
    {
        return FormField::create_tag(
            'input',
            array(
                'type'  => 'text',
                'id'    => $this->ID(),
                'name'  => $this->getName(),
                'value' => $this->Value(),
                'style' => $this->getFieldStyle(),
            )
        );
    }

    /**
     * Create the Timestamp Field.
     *
     * @codeCoverageIgnore
     *
     * @return string
     */
    protected function createTimestampField()
    {
        return FormField::create_tag(
            'input',
            array(
                'type'  => 'text',
                'id'    => $this->ID() . '_Timestamp',
                'name'  => $this->getName() . '_Timestamp',
                'value' => time(),
                'style' => $this->getFieldStyle(),
            )
        );
    }
    
    /**
     * Return a configured style rule for the fields, if none is configured use a default display:none rule
     *
     * @codeCoverageIgnore
     *
     * @return string
     */
    protected function getFieldStyle()
    {
      $default_css_rule = 'display:none!important';
      $css_rule = \Config::inst()->get(__CLASS__, 'field_style_rule');
      if(!$css_rule) {
        return $default_css_rule;
      } else {
        return $css_rule;
      }
    }
}
