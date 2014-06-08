phtml
=====

Extremely simple PHP template engine which allows you to mix PHP and HTML seamlessly using only standard PHP syntax.

Hello World
===========

<?php $phtml = <<<'phtml'
<html>
  <body>
    $friend = array("John", "Mary");
    foreach ($friend as $name) {
      <p>Hello {{ $name }}!</p>
    }
  </body>
</html>
phtml;
require 'phtml.php';
