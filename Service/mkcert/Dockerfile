FROM golang

RUN git clone https://github.com/FiloSottile/mkcert && \
    cd mkcert && \
    go build -ldflags "-X main.Version=1.4.3" -o /bin/mkcert
