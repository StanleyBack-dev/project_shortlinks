# Shortlink Project

Este é um projeto Laravel que permite aos usuários encurtar URLs e acompanhar a quantidade de cliques em cada link encurtado.

## Requisitos

Antes de iniciar, certifique-se de que você tem os seguintes requisitos instalados:

- PHP >= 7.3
- MySQL
- Composer
- Laravel >= 7.0
- Um servidor web como Apache ou Nginx

## Sumário

- [Requisitos](#requisitos)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Criando um Usuário de Teste](#criando-um-usuário-de-teste)
- [Executando o Projeto](#executando-o-projeto)
- [Contato](#contato)
- [Demonstração](#demonstração)

## Instalação

Clone o repositório do GitHub:


```bash
git clone https://github.com/StanleyBack-dev/project_shortlinks.git
```

Navegue até o diretório do projeto:

```bash
cd project_shortlinks
```

Instale as dependências do projeto:

```bash
composer install
```

## Configuração

Crie um arquivo `.env` a partir do `.env.example` e configure as variáveis de ambiente:

```bash
cp .env.example .env
```

### Edite o arquivo `.env` e configure as variáveis de ambiente do banco de dados

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Execute as migrações para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

## Criando um Usuário de Teste

Para testar o sistema, você precisará de um usuário de teste. Siga os passos abaixo para criar um utilizando um seeder:

1. Certifique-se de que você já executou as migrações com `php artisan migrate`.

2. Crie um seeder para o usuário de teste, caso ainda não tenha um:

```bash
php artisan make:seeder UsersTableSeeder
```

3. Abra o arquivo gerado `database/seeders/UsersTableSeeder.php` e adicione o seguinte código para criar um novo usuário:

```bash
php <?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // Substitua 'password' pela senha desejada
        ]);
    }
}
```

4. Registre o seeder no arquivo `database/seeders/DatabaseSeeder.php` adicionando a seguinte linha ao método `run`:

```bash
php $this->call(UsersTableSeeder::class);
```

5. Volte ao terminal e execute o seeder para criar o usuário de teste:

```bash
php artisan db:seed --class=UsersTableSeeder
```

Agora você pode fazer login no sistema usando as credenciais do usuário de teste:

- Email: test@example.com
- Senha: password

Lembre-se de substituir 'password' pela senha real que você deseja usar para o usuário de teste.

## Executando o Projeto

Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

A aplicação estará disponível em `http://localhost:8000/login`.

## Contato

Para entrar em contato, você pode me encontrar nos seguintes canais:

- Email: contactstanley.devtech@gmail.com
- LinkedIn: [Stanley Rodrigues](https://www.linkedin.com/in/stanley-rodrigues-ab151617b/)
- Portfólio: [Stanley DevTech](https://stanleydevtech.netlify.app/)

## Demonstração

Assista a uma demonstração em vídeo do projeto aqui: [Vídeo de Demonstração](https://www.youtube.com/watch?v=nWpJO_3nPnc)