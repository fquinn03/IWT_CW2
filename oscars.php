<?php
//I have read and understood the sections of plagiarism in the College Policy on 
//assessment offences and confirm that the work is my own, with the work of others 
//clearly acknowledged. 
//I give my permission to submit my report to the plagiarism testing database 
//that the College is using and test it using plagiarism detection software, 
//search engines or meta-searching software." 

//References W3 School (XML, XSLT, PHP sections)
//https://www.w3schools.com/
//https://www.tutorialspoint.com/xslt/

// get the variables inputted by the user
$year = $_GET['year'];
$category = $_GET['category'];
$nominee = $_GET['nominee'];
$info = $_GET['info'];
$nomination = $_GET['nomination'];

//set $nomination to match xml requirements
if($nomination == "all"){
	$selectedNomination = "";
}
if($nomination == "win"){
	$selectedNomination = "yes";
}
if($nomination == "lose"){
	$selectedNomination = "no";
}
//remove any non-numerical input
$year= preg_replace("/[^0-9]/", "", $year);
//remove any non-alphabet input
$category= preg_replace("/[^a-zA-Z]/", "", $category);
$nominee= preg_replace("/[^a-zA-Z]/", "", $nominee);
$info= preg_replace("/[^a-zA-Z]/", "", $info);

//set the first letter of each word to uppercase
$category = ucwords($category);
$nominee = ucwords($nominee);
$info = ucwords($info);

//load xml file
$xmlDoc = new DomDocument();
$xmlDoc->load("oscars.xml");

//load xsl stylesheet
$xslDoc = new DomDocument();
$xslDoc->load("oscarStyleSheet.xsl");

//create processor object
$processor = new XSLTProcessor();

//pass stylesheet to XSLTProcessor
$xslDoc = $processor->importStylesheet($xslDoc);

//set parameters in XSL stylesheet
$processor->setParameter('', 'selectedYear', $year);
$processor->setParameter('', 'selectedCategory', $category);
$processor->setParameter('', 'selectedNominee', $nominee);
$processor->setParameter('', 'selectedInfo', $info);
$processor->setParameter('', 'selectedWon', $selectedNomination);

//combine xsl stylesheet and xml to produce html
$htmlDoc = $processor->transformToDoc($xmlDoc);
print $htmlDoc->saveXML();
?>