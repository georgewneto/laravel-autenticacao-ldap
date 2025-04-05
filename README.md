# Sistema de Autenticação Laravel + React

Sistema de autenticação completo desenvolvido com Laravel e React, oferecendo suporte para autenticação tradicional, Google OAuth e Active Directory.

## Requisitos

- PHP 8.1 ou superior
- Composer
- Node.js e npm
- Docker e Docker Compose (para OpenLDAP)
- SQLite (ou outro banco de dados suportado pelo Laravel)

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/georgewneto/laravel-autenticacao-ldap.git
cd laravel-autenticacao-ldap
```

2. Instale as dependências do PHP:
```bash
composer install
```

3. Instale as dependências do Node.js:
```bash
npm install
```

4. Copie o arquivo de ambiente:
```bash
cp .env.example .env
```

5. Gere a chave da aplicação:
```bash
php artisan key:generate
```

6. Configure o banco de dados no arquivo `.env`:
```
DB_CONNECTION=sqlite
```

7. Execute as migrações:
```bash
php artisan migrate
```

## Configuração do OpenLDAP

1. Inicie o container OpenLDAP:
```bash
docker-compose up -d
```

2. Verifique se o container está rodando:
```bash
docker ps
```

3. O servidor OpenLDAP estará disponível em:
   - Host: localhost
   - Porta: 389
   - Base DN: dc=example,dc=org
   - Admin DN: cn=admin,dc=example,dc=org
   - Senha do Admin: admin

4. Um usuário de teste já está configurado:
   - Username: george
   - Senha: kakaroto
   - DN completo: cn=george,dc=example,dc=org

## Configuração do Google OAuth

1. Acesse o [Google Cloud Console](https://console.cloud.google.com)
2. Crie um novo projeto ou selecione um existente
3. Configure as credenciais OAuth:
   - Tipo: Aplicativo Web
   - URIs de redirecionamento autorizados: `http://localhost:8008/auth/google/callback`
4. Copie o Client ID e Client Secret
5. Atualize o arquivo `.env`:
```
GOOGLE_CLIENT_ID=seu-client-id
GOOGLE_CLIENT_SECRET=seu-client-secret
GOOGLE_REDIRECT_URI=http://localhost:8008/auth/google/callback
```

## Executando o Projeto

1. Inicie o servidor Laravel:
```bash
php artisan serve --port=8008
```

2. Em outro terminal, inicie o Vite:
```bash
npm run dev
```

3. Acesse a aplicação em `http://localhost:8008`

## Funcionalidades

- Autenticação tradicional (email/senha)
- Login com Google OAuth
- Login com OpenLDAP
- Recuperação de senha
- Gerenciamento de perfil do usuário
- Proteção de rotas
- Middleware de autenticação
- Validação de formulários
- Mensagens de feedback
- Interface responsiva

## Estrutura do Projeto

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   └── ProfileController.php
│   │   └── Middleware/
│   ├── Models/
│   │   └── User.php
│   └── Services/
│       └── GoogleService.php
├── resources/
│   ├── js/
│   │   ├── Components/
│   │   ├── Layouts/
│   │   └── Pages/
│   └── views/
├── routes/
│   ├── auth.php
│   └── web.php
└── config/
    └── services.php
```

## Tecnologias Utilizadas

- Laravel 10
- React 18
- Inertia.js
- Tailwind CSS
- Docker
- OpenLDAP
- Google OAuth 2.0
- SQLite

## Contribuição

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/nova-feature`)
3. Faça commit das suas alterações (`git commit -m 'Adiciona nova feature'`)
4. Faça push para a branch (`git push origin feature/nova-feature`)
5. Abra um Pull Request

## Licença

Este projeto está licenciado sob a licença MIT.
