
# I came to give this pcap capture

## Enunciado

Se uma imagem vale mais do que mil palavras, então um gif vale mais que um milhão delas?
Na verdade, não importa nem quantos frames existam, esse gif não tem a ver com o desafio. Ache a flag em algum lugar no arquivo de captura em anexo.
A última coisa que tenho a dizer é:
![Vitas.gif](https://github.com/hackingdays23/challenges/blob/main/redes1/vitas.gif?raw=true "Vitas.gif")

>> Attachment: capture.pcapng

## Resolução

O desafio possui uma captura de pacotes `.pcapng`. Pode ser usada qualquer ferramenta para análise. Usaremos o Wireshark para esta demonstração.

Há muitas informações irrelevantes no arquivo, como chamadas ICMP, ARP, DNS, HTTP, TLS, etc. O desafio consiste na descoberta de uma ligação SIP sendo realizada com um CODEC inseguro que por sua vez permite que a ligação seja reproduzida. O próprio Wireshark possui um visualizador de chamadas VoIP (RTP Player).

1- Visualização VoIP ![Visualização VoIP](https://github.com/hackingdays23/challenges/blob/main/redes1/1-voip.png?raw=true "Visualização VoIP")

2- Telephony > VoIP Calls ![Telephony > VoIP Calls](https://github.com/hackingdays23/challenges/blob/main/redes1/2-voip.png?raw=true "Telephony > VoIP Calls")

3- Selecionar faixas > Play Streams ![Selecionar faixas > Play Streams](https://github.com/hackingdays23/challenges/blob/main/redes1/3-voip.png?raw=true "Selecionar faixas > Play Streams")

4- Ouvir as faixas! ![Ouvir as faixas!](https://github.com/hackingdays23/challenges/blob/main/redes1/4-voip.png?raw=true "Ouvir as faixas!")

O jogador poderia ouvir ambas os lados da ligação juntos ou cada um separadamente. Em uma poderia ser ouvido a música _The 7th Element (Vitas)_ e, em outra, uma voz gerada por inteligência artificial ditando a flag três vezes consecutivas.

**Resposta:** iFlag{SIPUDPVOIP}

_Nota: Como se tratava de uma áudio-flag, o input foi configurado case-insensitive, ou seja, qualquer combinação correta de caracteres, indepentende de maiúsculas ou minúsculas, seria aceito para finalizar o desafio._

