ARG version
FROM php:${version:-8.4}-cli

VOLUME /examples
COPY ./*.php /examples/
WORKDIR /examples

CMD [ "/bin/bash" ]
