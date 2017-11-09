# Teste de Programação - Voxus

## Instruções de Uso
(O desenvolvimento foi feito utilizando o WAMP, com PHP 7.1.9 e MySQL 5.7.19)

### Softwares Necessários
* Servidor Apache com PHP
* MySQL

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
* No navegador, acesse a seguinte URL: `~/index.php/migrate` (onde `~` é a URL para a raiz do projeto) para preparar o banco de dados.

## Partes

### Parte 0 : Instalação e configuração dos Frameworks
Tempo: aproximadamente 20 minutos

### Parte 1 : CRUD
* Tempo: aproximadamente 1 hora e 40 minutos
* Dificuldades e Desafios: -

### Parte 2 : Login Autenticado com Google
* Tempo: aproximadamente 8 horas
* Dificuldades e Desafios:
    * Entender como utilizar a API do Google
    * Entender quais informações devem ser mantidas no banco de dados

### Parte 3 : Tasks​ ​Mais​ ​Complexas 
* Tempo: cerca de 4 horas
* Dificuldades e Desafios:
    * Encontrar uma solução para o upload que fosse amigável e atendesse as necessidades

### Parte 4 : Tasks Completas
* Tempo: cerca de 1 hora
* Dificuldades e Desafios: -
