# Solve Web11:

If you have solved the last challenges of this saga, you prabably saw that this challenge was very nice to solve.

On this web app we had a search box but in this case is vulnerable to local file inclusion (LFI). However, in this case the attacker needs to fetch the file `/var/www/html/flag.txt`.

```
<div class="mt-4">
<?php
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    
    // Impede o armazenamento em cache da página pelo navegador
    header("Cache-Control: no-store, must-revalidate");
    
    echo "<h3>It's what I really think:</h3>";
    eval($code);
}
?>
</div>
```

By reading the flag, its content is encoded in base64 and ascii hex.

```
Abstraction of real code:

result = decode("NjggNzQgNzQgNzAgNzMgM2EgMmYgMmYgNzQgNzcgNjkgNzQgNzQgNjUgNzIgMmUgNjMgNmYgNmQgMmYgNjIgNjEgNjQgNmEgNmYgNzIgNjEgNzMgNWYgNmUgNmYgNzc=", base64)
flag = decode(result, ascii_hex)
```

It's not finished yet, you had to go to a tweeter (or X, wherever) page to see the flag in the posts.

```
h t t p s : / / t w i t t e r . c o m / b a d j o r a s _ n o w
```