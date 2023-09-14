import 'package:flutter/material.dart';

void main() {
  runApp(const MainApp());
}

class MainApp extends StatelessWidget {
  const MainApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: "Fluttered",
      theme: ThemeData(
        colorScheme:
            ColorScheme.fromSeed(seedColor: Color.fromARGB(255, 213, 18, 28)),
        useMaterial3: true,
      ),
      home: const MyHomePage(title: "Fluttered"),
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
  // funcs goes here :)
  var flag = 'Do you know the secret?!';
  var respFlag;
  final secretController = TextEditingController();

  void dispose() {
    secretController.dispose();
    super.dispose();
  }

  void printFlag() {
    if (secretController.text == 'iFlag{M0b1L3_n0W_4r3_fluTT3rEd}') {
      respFlag = 'Congratulations! Go submit your flag';
    } else {
      respFlag = 'Wrong answer!';
    }
    setState(() {
      flag = respFlag;
    });
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
                  Text(flag),
                  TextField(
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      hintText: 'Enter the secret?',
                    ),
                    controller: secretController,
                  ),
                  ElevatedButton(
                      onPressed: () {
                        printFlag();
                      },
                      child: Text('Get flag!'))
                ],
              )),
        ));
  }
}
