## Projeto Rick and Morty API

Este projeto é uma aplicação Laravel que consome a API pública do Rick and Morty para listar personagens, episódios e localizações.

### Requisitos

- PHP >= 8.0
- Composer
- Node.js >= 18
- NPM ou Yarn

### Instalação

1. Clone o repositório para o seu ambiente local:

    ```bash
    git clone https://github.com/seu-usuario/rick-and-morty-api.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd rick-and-morty-api
    ```

3. Instale as dependências PHP:

    ```bash
    composer install
    ```

4. Instale as dependências JavaScript:

    ```bash
    npm install
    # ou
    yarn install
    ```

5. Crie um arquivo `.env` baseado no arquivo `.env.example`:

    ```bash
    cp .env.example .env
    ```

6. Gere uma chave de aplicativo:

    ```bash
    php artisan key:generate
    ```

7. Configure as variáveis de ambiente no arquivo `.env`, incluindo a conexão com o banco de dados, se necessário.

### Execução

- Para executar o servidor de desenvolvimento, execute o seguinte comando:

    ```bash
    php artisan serve
    ```

    Isso iniciará o servidor de desenvolvimento em `http://localhost:8000`.

- Para compilar os ativos JavaScript e CSS, execute o seguinte comando em uma janela de terminal separada:

    ```bash
    npm run watch
    # ou
    yarn watch
    ```

    Isso irá iniciar o compilador de ativos e assistir a quaisquer mudanças nos arquivos JavaScript e CSS.

### Testes

Para executar os testes unitários, utilize o seguinte comando:

```bash
php artisan test