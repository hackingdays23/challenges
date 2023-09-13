FROM golang:1.21-alpine

WORKDIR /Users/joao.guimaraes/go/src/github.com/gu1mas/aris
COPY ./src .

RUN go get -d -v 
RUN go build -v -o chall1

CMD ["./chall1"]
