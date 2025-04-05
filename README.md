# Sistema de Autenticação Laravel com React

Este projeto é um sistema de autenticação desenvolvido com Laravel e React, que suporta múltiplos métodos de login, incluindo autenticação tradicional, Google OAuth e Active Directory.

## Requisitos

- PHP 8.1 ou superior
- Composer
- Node.js e NPM
- Extensão PHP LDAP
- Servidor de banco de dados SQLite (configurado por padrão)

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

6. Configure o banco de dados:
O projeto está configurado para usar SQLite por padrão. O arquivo do banco de dados será criado automaticamente em `database/database.sqlite`.

7. Execute as migrações:
```bash
php artisan migrate
```

## Configuração

### Configuração do Google OAuth

1. Acesse o [Google Cloud Console](https://console.cloud.google.com/)
2. Crie um novo projeto ou selecione um existente
3. Configure as credenciais OAuth2:
   - Tipo de aplicação: Web application
   - URIs de redirecionamento autorizados: `http://localhost:8008/auth/google/callback`
4. Copie o Client ID e Client Secret
5. Adicione as credenciais ao arquivo `.env`:
```
GOOGLE_CLIENT_ID=seu_client_id
GOOGLE_CLIENT_SECRET=seu_client_secret
GOOGLE_REDIRECT_URI=http://localhost:8008/auth/google/callback
```

### Configuração do Active Directory

Adicione as configurações do Active Directory ao arquivo `.env`:
```
LDAP_HOST=seu_servidor_ldap
LDAP_USERNAME=seu_usuario_ldap
LDAP_PASSWORD=sua_senha_ldap
LDAP_PORT=389
LDAP_BASE_DN=seu_base_dn
LDAP_SSL=false
LDAP_TLS=false
```

## Executando o Projeto

1. Inicie o servidor de desenvolvimento do Laravel:
```bash
php artisan serve --port=8008
```

2. Em outro terminal, inicie o servidor de desenvolvimento do Vite:
```bash
npm run dev
```

3. Acesse a aplicação:
- Frontend: http://localhost:5173
- Backend: http://localhost:8008

## Funcionalidades

- Autenticação tradicional com email e senha
- Login com Google OAuth
- Login com Active Directory
- Recuperação de senha
- Perfil do usuário
- Proteção de rotas
- Interface responsiva

## Estrutura do Projeto

```
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── Auth/
│   │           ├── GoogleController.php
│   │           └── LdapController.php
│   ├── Ldap/
│   │   └── User.php
│   └── Models/
│       └── User.php
├── resources/
│   └── js/
│       └── Pages/
│           └── Auth/
│               └── Login.jsx
├── routes/
│   └── web.php
└── config/
    └── services.php
```

## Tecnologias Utilizadas

- Laravel 12
- React
- Inertia.js
- Laravel Breeze
- Laravel Socialite
- LDAPRecord
- Tailwind CSS
- Vite

## Contribuição

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## Licença

Este projeto está licenciado sob a licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.
