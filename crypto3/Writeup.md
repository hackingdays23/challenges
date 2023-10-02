# Solve Crypto 3:

Upon accessing the web page, we don't see many available information - just a login page.

However, looking to the HTML code, our dev forgot some information leakage:

```
... snip ...
<!DOCTYPE html>
<html>
<head>
    <title>Store super 1337</title>
    <!-- remember to change this: b2WvL2KgLUL{Ov<< -->
    <!-- do you think you are a cyberchef? uhuu nice haha -->
    
    <style>
... snip ...
```

# Decrypting the hash:

Using CyberChef, on Magic mode (with Intensive Mode and Extensive language support) we can see that the password is encrypted using XOR({'option':'Hex','string':'1'},'Standard',false). The result is encoded with base64 and, finally, by decoding the output is sup3r_1337.

# Login:

Finally, using the credentials admin:sup3r_1337 the flag will popup in the screen: iFlag{N1c3_t0_b3_4dm1n}.