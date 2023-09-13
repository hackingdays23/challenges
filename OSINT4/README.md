
# Mão amiga

## Enunciado

Um amigo me enviou esta mensagem. Eu definitivamente não me lembro do telefone, você consegue descobrir?

Insira a resposta no formato iFlag{xxxx-xxxx}

>> Attachment: Saudações!.eml

## Resolução

O desafio contém um arquivo `.eml`, que é um formato para e-mails. Pode-se abrir em um visualizador qualquer para ver seu conteúdo:

[![Visualização e-mail](https://github.com/hackingdays23/challenges/blob/main/OSINT4/1-visualizacao-e-mail.png?raw=true "Visualização e-mail")]

Pode-se notar a existência de um arquivo `.jpg` anexado ao e-mail. O download deste deve ser feito e a imagem deve ser analisada.

[![Imagem anexada - DSC-4242](https://github.com/hackingdays23/challenges/blob/main/OSINT4/DSC-4242.jpg?raw=true "Imagem anexada - DSC-4242")]

Entre as diversas formas de análise da foto, a mais importante é a extração de seus metadados através de qualquer ferramenta. Para a demonstração, foi utilizado o Exiftool. A extração permitem descobrir diversas informações relevantes sobre a foto, como data de captura, câmera utilizada e coordenadas GPS.

[![Extração de metadados usando Exiftool](https://github.com/hackingdays23/challenges/blob/main/OSINT4/2-extracao-de-metadados.png?raw=true "Extração de metadados usando Exiftool")]

As coordenadas podem ser úteis para a descoberta do local através do Google Maps. Primeiro, é necessário transformar as coordenadas de latitude e longitude em formato pesquisável para o Google Maps.

Dessa forma,

| Metadado | Valor |
| :---------- | :--------- |
| `GPS Latitude` | `23 deg 30' 22.65" S` |
| `GPS Longitude` | `47 deg 28' 42.02" W` |
| `GPS Position` | `23 deg 30' 22.65" S, 47 deg 28' 42.02" W` |

Devem ser traduzidos para: **`-23.5062917, -47.4783389`**

Pesquisar no Google Maps e, em seguida, entrar na visualização do Google Street View revela inicialmente somente uma cafeteria aberta nos dias atuais, o que não serve como resposta para o desafio já que o autor do e-mail, o MrAngryResearcher, indicou que o lugar já encerrou suas atividades.

[![Visualização das coordenadas no Google Maps](https://github.com/hackingdays23/challenges/blob/main/OSINT4/3-maps.jpeg?raw=true "Visualização das coordenadas no Google Maps")]

Dessa forma, deve-se utilizar uma feature do Google Street View de visualizar outros anos de captura de ruas. Para as coordenadas informadas, existem informações de 2021 até 2011.

[![Visualização das coordenadas no Google Street View](https://github.com/hackingdays23/challenges/blob/main/OSINT4/4-gmaps-street.jpeg?raw=true "Visualização das coordenadas no Google Street View")]

Selecionar o ano de 2011 revela uma lan house tal qual a foto enviada por e-mail, cinza e com o letreiro Cyber em sua entrada. Este é o lugar correto.

[![Visualização de anos anteriores do Google Street View](https://github.com/hackingdays23/challenges/blob/main/OSINT4/5-gmaps-streetold.jpeg?raw=true "Visualização de anos anteriores do Google Street View")]

Para concluir o desafio, deve-se olhar para o letreiro com os telefones da loja e colocar o primeiro no formato informado no enunciado.

**Resposta:** iFlag{3222-9766}
