# Teste de Programação - Voxus

## Instruções de Uso
### Programas
* Servidor Apache com PHP
* MySQL
(O desenvolvimento foi feito utilizando o WAMP, com PHP 7.1.9)

### Instruções
* Crie um usuário no MySQL com nome root, sem senha
* Crie um banco de dados chamado `desafiovoxus`
* Faça o download do arquivo `cacert.pem` em: https://curl.haxx.se/docs/caextract.html
 e adicione-o à pasta `extras\ssl` do PHP (no caso do WAMP está em `wamp64\bin\php\php7.1.9\extras\ssl`)
* Abra o `php.ini` (no caso do WAMP, `wamp64\bin\php\php7.1.9\phpForApache.ini`).
* Procure por:
```
;;;;;;;;;;;;;;;;;;;;
; php.ini Options  ;
;;;;;;;;;;;;;;;;;;;;
```
* Adicione abaixo:
```
curl.cainfo = "<diretorio do wamp>\bin\php\php7.1.9\extras\ssl\cacert.pem"
```
* Salve e reinicie o servidor

## Partes

### Parte 0 : Instalação e configuração dos Frameworks
Tempo: aproximadamente 20 minutos

### Parte 1 : CRUD
Tempo: aproximadamente 1 hora e 40 minutos

### Parte 2 : Login Autenticado com Google
Tempo: aproximadamente 8 horas
Dificuldades e Desafios:
* Entender como utilizar a API do Google
* Entender quais informações devem ser mantidas no banco de dados

### Parte 3 : Tasks​ ​Mais​ ​Complexas 
Tempo: cerca de 4 horas
Dificuldades e Desafios:
* Encontrar uma solução para o upload que fosse amigável e atendesse as necessidades

### Parte 4 :
