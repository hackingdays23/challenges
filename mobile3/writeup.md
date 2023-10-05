## Fluttered Two Writeup

In this seconde mobile challenge was wrote in flutter too but this time is a debug version, to solve this one repeat the first step is the same of Fluttered One, rename and unzip the apk file or just decompile it.
In the directory `assets/flutter_assets` have a file called `kernel_blob.bin` that is a snapshot of the dartVM, this file is only present in debug apps. This file contains snippets of code, where is possible to found a function that contains a secret and an IV.
Get all this pieces and go to [cyberchef](https://gchq.github.io/CyberChef/) to decrypt the string and got the flag.

```dart
   final base64Key = 'NkNBakNhIVZyZyEhUDJDCg==';
    final base64Iv = 'eFZlZmZBOU1SQ01wZiNiCg==';
    final key = base64Decode(base64Key);
    final iv = base64Decode(base64Iv);
```

```dart
final encryptedText = 'lpwkJhdDUFkC72Ei901K6SQjs7pCDFcDbgk8Bl6qfa8=';
```

![]("img/screenshot.png")

`iFlag{e4sy_sn4psh0t_d3bUg_n0?!}`
