<?php namespace StudioBonito\SilverStripe\SpamProtection\Honeypot\Tests;

use Mockery as m;
use StudioBonito\SilverStripe\SpamProtection\Honeypot\FormField\HoneypotField;
use SilverStripe\Core\Config\Config;
use SilverStripe\Control\Controller;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Dev\SapphireTest;

class HoneypotFieldTest extends SapphireTest
{

    protected $usesDatabase = true;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers StudioBonito\SilverStripe\SpamProtection\Honeypot\FormField\HoneypotField::validate
     */
    public function testInvalidWithCaptcha()
    {
        $form = $this->getForm();
        $validator = $this->getValidator();

        $honeypotField = new HoneypotField('Captcha');
        $honeypotField->setForm($form);
        $honeypotField->setValue('foobar');

        $valid = $honeypotField->validate($validator);

        $this->assertFalse($valid);
    }

    /**
     * @covers StudioBonito\SilverStripe\SpamProtection\Honeypot\FormField\HoneypotField::validate
     */
    public function testValidWithEmptyCaptcha()
    {
        $form = $this->getForm();
        $validator = $this->getValidator();

        $honeypotField = new HoneypotField('Captcha');
        $honeypotField->setForm($form);
        $honeypotField->setValue(null);

        $valid = $honeypotField->validate($validator);

        $this->assertTrue($valid);
    }
    
    public function testCustomStyleAttribute()
    {
        $styleRule = "position:absolute!important;left:-9000px!important;";
        Config::modify()->set('StudioBonito\SilverStripe\SpamProtection\Honeypot\FormField\HoneypotField', 'field_style_rule', $styleRule);
        
        $honeypotField = new HoneypotField('Captcha');
        $honeypotField->setValue(null);
        
        $styleAttribute = $honeypotField->getFieldStyle();
        
        $this->assertEquals($styleRule, $styleAttribute);
    }
    
    public function testDefaultStyleAttribute()
    {
        $defaultStyleRule = 'display:none!important';
        Config::inst()->remove('StudioBonito\SilverStripe\SpamProtection\Honeypot\FormField\HoneypotField', 'field_style_rule');
        
        $honeypotField = new HoneypotField('Captcha');
        $honeypotField->setValue(null);
        
        $styleAttribute = $honeypotField->getFieldStyle();
        
        $this->assertEquals($defaultStyleRule, $styleAttribute);
    }

    /**
     * @return m\MockInterface
     */
    protected function getForm()
    {
        $request = m::mock('Request');

        $request->shouldReceive('postVar')
            ->andReturn(time() - 10);

        $controller = m::mock(Controller::class);

        $controller->shouldReceive('getRequest')
            ->andReturn($request);

        $form = m::mock(Form::class);

        $form->shouldReceive('getController')
            ->andReturn($controller);

        return $form;
    }

    /**
     * @return m\MockInterface
     */
    protected function getValidator()
    {
        $validator = m::mock(RequiredFields::class)
            ->shouldReceive('validationError')
            ->getMock();

        return $validator;
    }
}
