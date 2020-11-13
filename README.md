<h1 align="center">Calendar App</h1>

<p align="center">
<a href="https://laravel.com/docs/8.x"><img src="https://img.shields.io/badge/Laravel-8.4.0-red?logo=laravel" alt="Laravel Version"></a>
<a href="https://getbootstrap.com/docs/4.5/getting-started/introduction/"><img src="https://img.shields.io/badge/Bootstrap-4.5-blueviolet?logo=bootstrap" alt="Bootstrap Version"></a>
<img src="https://img.shields.io/badge/Docker%20Compose-3.8-blue?logo=docker" alt="Docker Compose">
<br />
<img src="https://img.shields.io/badge/GitGuardian-active-success" alt="GitGuardian">
<img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/joseantonnio/calendar-app?label=Last%20Commit">
<img alt="GitHub tag (latest by date)" src="https://img.shields.io/github/v/tag/joseantonnio/calendar-app?label=Last%20Version">
<a href="https://creativecommons.org/licenses/by-nc-sa/4.0"><img src="https://img.shields.io/badge/License-CC%20BY--NC--SA%204.0-success?logo=creative-commons" alt="CC BY-NC-SA 4.0"></a>
</p>

## About

A simple and modern events calendar.

### The Challenge

Mínimo:
- [x] Cadastro de usuário
- [x] Login para acesso ao sistema
- [x] Adição de eventos
- [ ] Edição de eventos
- [ ] Remoção de eventos
- [ ] Listagem de eventos

Os atributos necessários para o evento são:
- [x] Descrição
- [x] Hora de início
- [x] Hora de término

Obrigatório:
- [x] Não deixar sobrescrever eventos e caso ocorra, emitir um alerta para o usuário
- [x] Suporte a vários usuários
- [x] Eventos ligados ao usuário que os criou
- [x] Frontend renderizado no lado do cliente

Desejável:
- [x] Eventos com duração de mais de um dia
- [ ] Caso haja suporte a vários usuários, também poderá ser implementado o convite a outros usuários para eventos, ou seja, o evento aparecerá no calendário do usuário convidado e o usuário convidado poderá responder se poderá participar ou não (RSVP)
- [X] Responsividade, assim como o uso de Bootstrap ou outro framework CSS
- [ ] Alguma funcionalidade diferente que você pensar

## Installation

You'll need [Docker CE](https://docs.docker.com/install/) and [Docker Compose](https://docs.docker.com/compose/install/) installed on your computer in order to run this application.

### Preparing the Environment

First, clone this repository with the command:

```
git clone git@github.com:joseantonnio/calendar-app.git
```

Then switch to the repository folder:

```
cd calendar-app
```

Now execute the environment:

```
docker-compose up -d
```

And check if application is running correctly:

```
docker ps -a
```

Don't forget to copy the configuration example file:

```
docker exec -it calendar-app cp .env.example .env
```

Remember to install all dependencies using composer:

```
docker exec -it calendar-app composer install
```

Update the `.env` file contents to the following:

```
DB_CONNECTION=mysql
DB_HOST=calendar-database
DB_PORT=3306
DB_DATABASE=calendar
DB_USERNAME=calendaruser
DB_PASSWORD=wghr918E
```

In `.env` file you can change your SMTP configuration to Gmail, Sendgrid or any other mail sending tool:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=your@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

> Don't forget **YOUR** username and password on the configuration lines above.
> If you don't know how to configure Gmail SMTP, just follow this [Google Support Topic](https://support.google.com/a/answer/176600).

Remember to generate a Laravel master key:

```
docker exec -it calendar-app php artisan key:generate
```

And JWT secret too:

```
docker exec -it calendar-app php artisan jwt:secret
```

Now run all the migrations:

```
docker exec -it calendar-app php artisan migrate
```

And install node packages:

```
docker-compose run --rm calendar-node npm install
```

Finally you'll need to compile all frontend styles and scripts in development mode:

```
docker-compose run --rm calendar-node npm run dev
```

**OR** you production mode:

```
docker-compose run --rm calendar-node npm run prod
```

Done! Now you can access the application at http://localhost:8090.

---

*If you're developing, don't forget to keep frontend watcher always running with this command: `docker-compose run --rm calendar-node npm run watch`*

## License

<p xmlns:dct="http://purl.org/dc/terms/" xmlns:cc="http://creativecommons.org/ns#" class="license-text"><a rel="cc:attributionURL" property="dct:title" href="https://github.com/joseantonnio/calendar-app">Calendar App</a> by <a rel="cc:attributionURL dct:creator" property="cc:attributionName" href="https://www.linkedin.com/in/joseantonnio/">José Antonio</a> is licensed under <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/4.0">CC BY-NC-SA 4.0</a>
