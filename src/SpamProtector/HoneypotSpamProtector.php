<?php

namespace StudioBonito\SilverStripe\SpamProtection\Honeypot\SpamProtector;

use SilverStripe\Forms\FormField;
use SilverStripe\SpamProtection\SpamProtector;
use StudioBonito\SilverStripe\SpamProtection\Honeypot\FormField\HoneypotField;

class HoneypotSpamProtector implements SpamProtector
{
    /**
     * Return the {@link FormField} associated with this protector.
     *
     * Most spam methods will simply return a piece of HTML to be injected at
     * the end of the form. If a spam method needs to inject more than one
     * form field (i.e a hidden field and a text field) then return a
     * {@link FieldGroup} from this method to include both.
     *
     * @codeCoverageIgnore
     *
     * @param string $name
     * @param string $title
     * @param mixed  $value
     *
     * @return FormField The resulting field
     */
    public function getFormField($name = null, $title = null, $value = null)
    {
        return HoneypotField::create($name, $title, $value);
    }

    /**
     * Not used.
     *
     * @codeCoverageIgnore
     */
    public function setFieldMapping($fieldMapping)
    {
    }
}
