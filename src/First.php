<?php

/**
 * @author Berna Tibor
 * @since 2016.11.02. 21:46
 */
class First
{
    public $rules = array(
        '/(\*\*)(.*?)\1/' => '<strong>\2</strong>', // bold
        '/(\˙)(.*?)\1/' => '<pre>\2</pre>', // inline code
        '/(\_)(.*?)\1/' => '<i>\2</i>', // italic
        '/(\[)(.+)(\])(\()(.+)(\))/' => '<a href=\"\2\">\5</a>' // link
    );

    public function parse($input)
    {
        $output = "";

        foreach ($this->rules as $regex => $replacement) {
            $output = preg_replace($regex, $replacement, $input);
        }

        return $output;
    }

    /**
     * @param $text
     * @return string
     */
    public function parseStrong($text)
    {
        $regex = '/(\*\*)(.*?)\1/';
        $replacement = '<strong>\2</strong>';

        return preg_replace($regex, $replacement, $text);
    }

    /**
     * @param $text
     * @return string
     */
    public function parseItalic($text)
    {
        $regex = '/(\_)(.*?)\1/';
        $replacement = '<i>\2</i>';

        return preg_replace($regex, $replacement, $text);
    }

    /**
     * @param $text
     * @return string
     */
    public function parseLink($text)
    {
        $regex = '/(\[)(.+)(\])(\()(.+)(\))/';
        $replacement = '<a href="\2">\5</a>';

        return preg_replace($regex, $replacement, $text);
    }
}