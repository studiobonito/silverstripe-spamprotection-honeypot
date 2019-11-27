<?php

namespace StudioBonito\SilverStripe\SpamProtection\Honeypot\FormField;

use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\Validator;

class HoneypotField extends TextField
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
     * @param Validator $validator
     * @return bool
     */
    public function validate($validator)
    {
        $timeLimit = $this->config()->time_limit;

        $timestamp = $this->getForm()->getController()->getRequest()->postVar($this->getName() . '_Timestamp');

        if (!empty($this->Value()) || ($timeLimit > 0 && ($timestamp + $timeLimit) > time())) {
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
     * @return array
     */
    public function getAttributes()
    {
        $attributes = parent::getAttributes();

        $attributes['class'] = '';
        $attributes['style'] = 'display: none;';

        return $attributes;
    }

    /**
     * Override the Type to remove the class namespace.
     *
     * @codeCoverageIgnore
     * @return string
     */
    public function Type(): string
    {
        return 'honeypotspamprotector';
    }

    /**
     * @param array $properties
     * @return string
     */
    public function FieldHolder($properties = array())
    {
        return $this->Field($properties);
    }

    /**
     * @param array $properties
     * @return string
     */
    function SmallFieldHolder($properties = array())
    {
        return $this->FieldHolder($properties);
    }

    /**
     * A companion timestamp field
     *
     * @return HiddenField
     */
    public function getTimestampField()
    {
        return HiddenField::create(
            sprintf('%s_Timestamp', $this->getName()),
            null,
            time()
        );
    }
}
