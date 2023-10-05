import 'package:flutter/material.dart';
import 'package:pointycastle/export.dart' as pc;
import 'package:crypto/crypto.dart';
import 'dart:convert';
import 'dart:typed_data';

void main() {
  runApp(const MainApp());
}

class MainApp extends StatelessWidget {
  const MainApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'FlutteredTwo',
      theme: ThemeData(
        colorScheme:
            ColorScheme.fromSeed(seedColor: Color.fromARGB(255, 213, 18, 28)),
        useMaterial3: true,
      ),
      home: const MyHomePage(title: 'FlutteredTwo'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key, required this.title});
  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  var msg = 'lpwkJhdDUFkC72Ei901K6SQjs7pCDFcDbgk8Bl6qfa8=';
  final secretController = TextEditingController();

  void dispose() {
    secretController.dispose();
    super.dispose();
  }

  Uint8List decryptAESCBC(
      Uint8List key, Uint8List iv, Uint8List encryptedText) {
    final cipher = pc.CBCBlockCipher(pc.AESFastEngine())
      ..init(false, pc.ParametersWithIV(pc.KeyParameter(key), iv));
    final paddedText = Uint8List.fromList(encryptedText);
    final decryptedText = Uint8List(paddedText.length);

    for (var i = 0; i < paddedText.length; i += 16) {
      final chunkSize =
          (i + 16 <= paddedText.length) ? 16 : paddedText.length - i;
      cipher.processBlock(paddedText, i, decryptedText, i);
    }

    return decryptedText;
  }

  String decryptFlag() {
    final base64Key = 'NkNBakNhIVZyZyEhUDJDCg==';
    final base64Iv = 'eFZlZmZBOU1SQ01wZiNiCg==';
    final encryptedText = 'lpwkJhdDUFkC72Ei901K6SQjs7pCDFcDbgk8Bl6qfa8=';

    final key = base64Decode(base64Key);
    final iv = base64Decode(base64Iv);
    final ct = base64Decode(encryptedText);

    return utf8.decode(decryptAESCBC(key, iv, ct));
  }

  void checkFlag() {
    var flag = decryptFlag().substring(0, decryptFlag().length - 1);
    if (secretController.text == flag) {
      setState(() {
        msg = 'Great! Run, go submit! 🏃🏻‍♂️';
      });
    } else {
      setState(() {
        msg = 'Peeeen! Wrong 🤣';
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Theme.of(context).colorScheme.inversePrimary,
        title: Text(widget.title),
      ),
      body: Center(
        child: Padding(
          padding: EdgeInsets.all(20.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text(msg),
              TextField(
                decoration: InputDecoration(
                  border: OutlineInputBorder(),
                  hintText: 'Do you know the secret?',
                ),
                controller: secretController,
              ),
              ElevatedButton(
                  onPressed: () {
                    checkFlag();
                  },
                  child: Text('?'))
            ],
          ),
        ),
      ),
    );
  }
}
