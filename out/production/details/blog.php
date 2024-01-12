<?php
$page = file_get_contents('http://www.indiegogo.com/projects/ubuntu-edg');

$doc = new DOMDocument;
libxml_use_internal_errors(true);
$doc->loadHTML($page);

$finder = new DomXPath($doc);

// find class="money-raised"
$nodes = $finder->query("//*[contains(@class, 'money-raised')]");

// get the children of the first match  (class="money-raised")
$raised_children = $nodes->item(0)->childNodes;

// get the children of the second match (class="money-raised goal")
$goal_children = $nodes->item(1)->childNodes;

// get the amount value
$money_earned = $raised_children->item(1)->nodeValue;

// get the amount value
preg_match('/\$[\d,]+/', $goal_children->item(0)->nodeValue, $m);
$money_earned_goal = $m[0];


echo "Money earned: $money_earned\n";
echo "Goal: $money_earned_goal\n";

?>