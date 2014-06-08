PHTML
=====

Extremely simple PHP template engine which allows you to mix PHP and HTML seamlessly using only standard PHP syntax other than {{ and }}.

How To
======

Change the first line in your PHP file from...

    <?php

to this...

    <?php $phtml = <<<'phtml'

Add these two lines to the end of your PHP file...

    phtml;
    require 'phtml.php';
    
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
