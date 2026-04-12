# PHP.lab Examples

### Docker

```console
docker build -t php-lab-pure .
```

```console
docker create -it -v ./:/examples --name php-lab-examples-features php-lab-pure
```

```console
docker start -i php-lab-examples-features
```
