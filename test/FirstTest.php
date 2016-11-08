<?php

/**
 * @author Berna Tibor
 * @since 2016.11.02. 21:49
 */
class FirstTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var First
     */
    private $object;

    public function setUp()
    {
        $this->object = new First();
    }

    /**
     * @dataProvider strongProvider
     */
    public function testStrong($text, $expected)
    {
        $this->assertEquals($expected, $this->object->parseStrong($text));
    }

    /**
     * @dataProvider italicProvider
     */
    public function testItalic($text, $expected)
    {
        $this->assertEquals($expected, $this->object->parseItalic($text));
    }

    /**
     * @dataProvider linkProvider
     */
    public function testLink($text, $expected)
    {
        $this->assertEquals($expected, $this->object->parseLink($text));
    }

    public function strongProvider()
    {
        return array(
            array("This text **has bold** in the middle", "This text <strong>has bold</strong> in the middle"),
            array("No bold at all", "No bold at all"),
            array("**Totally bold**", "<strong>Totally bold</strong>")
        );
    }

    public function italicProvider()
    {
        return array(
            array("This text _has italic_ in the middle", "This text <i>has italic</i> in the middle"),
            array("No italic at all", "No italic at all"),
            array("_Totally italic_", "<i>Totally italic</i>")
        );
    }

    public function linkProvider()
    {
        return array(
            array("There is a [http://whatever.com](link) in this", 'There is a <a href="http://whatever.com">link</a> in this'),
            array("No link at all", "No link at all")
        );
    }
}
