<?php

use Fryiee\ACF\FieldGroup;

class FieldGroupTest extends PHPUnit_Framework_TestCase {

    public function testFieldGroupGeneration()
    {
        $fieldGroup = new FieldGroup('Test Field Group', '12345', []);

        $generatedArray = $fieldGroup->generate();

        $this->assertEquals('group_test_field_group12345', $generatedArray['key']);
        $this->assertEquals('Test Field Group', $generatedArray['title']);
    }

    public function testAddingLocation()
    {

        $fieldGroup = new FieldGroup('Test Field Group', '12345', []);

        $fieldGroup->addLocation([
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'post'
        ]);

        $generatedArray = $fieldGroup->generate();

        $this->assertEquals('post_type', $generatedArray['location'][0][0]['param']);
        $this->assertEquals('==', $generatedArray['location'][0][0]['operator']);
        $this->assertEquals('post', $generatedArray['location'][0][0]['value']);
    }
}