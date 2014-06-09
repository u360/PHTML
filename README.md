PHTML
=====

Extremely simple PHP/HTML template engine which allows you to mix PHP and HTML seamlessly using only standard PHP and HTML syntax. There are no new language commands or syntax to learn.

How To
------

1.) Change the first line of your PHP files from this...

    <?php

to this...

    <?php $phtml = <<<'phtml'

2.) Add these two lines to the end of your PHP files...

    phtml;
    require 'phtml.php';

That's it!

Hello World
-----------

    <?php $phtml = <<<'phtml'
    <html>
      <body>
        $friend = array("John", "Mary");
        foreach ($friend as $name) {
          <p>Hello <? $name ?>!</p>
        }
      </body>
    </html>
    phtml;
    require 'phtml.php';

HTML Lines
----------

Lines that begin with `<` are treated as HTML lines. If the line does not end with `>`, then the next line is treated as an HTML line as well. So will all lines until a line does end with `>`.

These lines will be treated as HTML lines...

    <p>Hello World!</p>
    <img src="photo.jpg" width="400" height="300" />
    
and this whole section will be treated as HTML lines...

    <a href="#" class="large-font"
        onmouseover="dosomething()"
        onclick="dosomethingelse()">
      <img src="icon.png" />
    </a>

Script & Style Sections
-----------------------

All of the lines within a `<script>` or `<style>` section are treated as HTML lines. The `<script>` and `<style>` tags must be on a line by themselves.

This whole section will be treated as HTML lines...

    <style>
      body {margin: 0}
    </style>
    <script>
      var username = "johndoe";
    </script>

HTML Comments
-------------

HTML comments are treated as PHP expressions. If you need to output some dynamic content within an HTML line, you can include the dynamic content as a PHP expression within an HTML comment which begins with `<!--` and ends with `-->`.

This HTML line includes dynamic content produced by PHP code...

    <p><big>Hello <!-- $name -->!</big></p>
    
Suppose that the PHP variable $name was defined as "John Doe", then that line would send this to the browser...

    <p><big>Hello John Doe!</big></p>
    
PHP Lines
---------

All other lines are treated as regular PHP lines. There are no new commands or syntax.

No Whitespace
-------------

All of the lines are trimmed of leading and trailing whitespace. This makes it easier to output HTML elements that are supposed to be next to each other. No more gaps between images.

There will be no space or gap between these images...

    <td>
      $photos = array("left.jpg", "middle.jpg", "right.jpg");
      foreach ($photos as $image) {
        <img src="<!-- $image -->" />
      }
    </td>

