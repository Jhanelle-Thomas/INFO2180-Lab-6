<?php

// accept a term (keyword)
// respond with a value

$query = $_GET['q'];

if ($query != "") {
    $definition = [
        "definition" => "A statement of the exact meaning of a word, especially in a dictionary.",
        "bar" => "A place that sells alcholic beverages",
        "ajax" => "Technique which involves the use of javascript and xml (or JSON)",
        "html" => "The standard markup language for creating web pages and web applications.",
        "css" => "A style sheet language used for describing the presentation of a document written in a markup language.",
        "javascript" => "A lightweight, interpreted programming language with first-class functions that adds interactivity to your website.",
        "php" => "A server-side scripting language, and a powerful tool for making dynamic and interactive websites",
    ];
        
    print "<h3>" . strtoupper($query) . "</h3>";
    print "<p>" . $definition[$query] . "</p>";

} else {

    $xmldefinitions = '<?xml version="1.0" encoding="UTF-8"?>
    <dictionary>
        <item>
            <word>definition</word>
            <definition>A statement of the exact meaning of a word, especially in a dictionary.</definition>
            <author>Merriam-Webster</author>
        </item>
        <item>
            <word>bar</word>
            <definition>A place that sells alcholic beverages</definition>
            <author>Oxford</author>
        </item>
        <item>
            <word>ajax</word>
            <definition>Technique which involves the use of javascript and xml (or JSON)</definition>
            <author>Microsoft</author>
        </item>
        <item>
            <word>html</word>
            <definition>The standard markup language for creating web pages and web applications.</definition>
            <author>Tim Berners-Lee</author>
        </item>
        <item>
            <word>css</word>
            <definition>A style sheet language used for describing the presentation of a document written in a markup language."</definition>
            <author>Håkon Wium Lie Bert Bos</author>
        </item>
        <item>
            <word>javascript</word>
            <definition>A lightweight, interpreted programming language with first-class functions that adds interactivity to your website.</definition>
            <author>Brendan Eich</author>
        </item>
        <item>
            <word>php</word>
            <definition>A server-side scripting language, and a powerful tool for making dynamic and interactive websites.</definition>
            <author>Rasmus Lerdorf</author>
        </item>
    </dictionary>';
    
    header('Content-Type: text/xml');
    $xmlOutput = new SimpleXMLElement($xmldefinitions);
    echo $xmlOutput->asXML();
}