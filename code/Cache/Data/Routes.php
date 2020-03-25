<?php
return array(
':l/Tags/:module/:tag/:p' => 'Home/Tags/index',
':l/Tags/:tag/:p' => 'Home/Tags/index',
':l/Tags/:module/:tag' => 'Home/Tags/index',
':l/Tags/:p\d' => 'Home/Tags/index',
':l/Tags/:tag' => 'Home/Tags/index',
':l/Tags' => 'Home/Tags/index',
'Tags/:module/:tag/:p' => 'Home/Tags/index',
'Tags/:tag/:p' => 'Home/Tags/index',
'Tags/:module/:tag' => 'Home/Tags/index',
'Tags/:p\d' => 'Home/Tags/index',
'Tags/:tag' => 'Home/Tags/index',
'Tags' => 'Home/Tags/index',
'/^(cn|en)$/' => 'Index/index?l=:1',
'/^(cn|en)\/([A-Z]{1}[a-z]+)\/show\/(\d+)-(\d+)$/' => 'Urlrule/show?l=:1&module=:2&id=:3&p=:4&',
'/^([A-Z]{1}[a-z]+)\/show\/(\d+)-(\d+)$/' => 'Urlrule/show?module=:1&id=:2&p=:3&',
'/^(cn|en)\/([A-Z]{1}[a-z]+)\/show\/(\d+)$/' => 'Urlrule/show?l=:1&module=:2&id=:3&',
'/^([A-Z]{1}[a-z]+)\/show\/(\d+)$/' => 'Urlrule/show?module=:1&id=:2&',
'/^(cn|en)\/([A-Z]{1}[a-z]+)\/list\/(\d+)-(\d+)$/' => 'Urlrule/index?l=:1&module=:2&catid=:3&p=:4&',
'/^([A-Z]{1}[a-z]+)\/list\/(\d+)-(\d+)$/' => 'Urlrule/index?module=:1&catid=:2&p=:3&',
'/^(cn|en)\/([A-Z]{1}[a-z]+)\/list\/(\d+)$/' => 'Urlrule/index?l=:1&module=:2&catid=:3&',
'/^([A-Z]{1}[a-z]+)\/list\/(\d+)$/' => 'Urlrule/index?module=:1&catid=:2&'
);
?>