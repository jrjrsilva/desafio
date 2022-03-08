# Desafio - Laravel - Wordpress - NGINX

Este projeto foi desenvolvido utilizando containers docker
Com o objetivo de fazer integração com o REST Viacep no endereço: http://viacep.com.br/ws/

Laravel com php Fpm, Wordpress rodando sobre o Nginx e os bancos Mysql e Maria DB;

A utilização de um Dockerfile tem o objetivo de criar criar o container FPM-PHP e facilitar a execução de comandos necessárias à configuração do contaner laravel;

Na pasta raiz esta o projeto Laravel;
Em wordpress_data os arquivos do Wordpress;
Em mariadb_data os arquvos do MariaDB;

O Wordpres tem um endpoint criado no endereço: http://localhost:88/wp-json/api/v1/cep/01001000

O Laravel tem uma rota GET criada no endereço:
http://localhost:8000/cep/01001000

O arquvo docker-compose.yml mostra as instruções de como subir os contaners

##Instruções

Para executar o projeto faz-se necessário ter o docker e o git instalados no host;
Clone o projeto e dentro da pasta criada execute:

1 - faça a cópia do arquivo .env.example para .env - estão setados valores de usuário, senha e bancos de dados, altere estas informações de acordo com suas necessidades, principalmente as portas dos serviços para evitar conflitos com aplicações rodando localmente no host.

2 - docker-compose up -d;
Fará o download das imagens caso você não as tenha e subirá os containers, faremos os ajustes a segue para o pleno funcinamento

3 - docker-compose exec app composer install;
Faz as instalaçãos das bibliotecas do Laravel

4 - docker-compose exec app php artisan key:generate;
Criará a chave de criptografia da aplicação para segurança csrf token

5 - execute docker-compose down;
Para para os containers

6 docker-compose up -d;
Para iniciar os containers carregando novamente as atualizações do .env
