## Projeto Rick and Morty API

Este projeto é uma aplicação Laravel que consome a API pública do Rick and Morty para listar personagens, episódios e localizações.

### Requisitos

- PHP >= 8.2
- Composer
- Node.js >= 18
- NPM

### Instalação

1. Clone o repositório para o seu ambiente local:

    ```bash
    git clone https://github.com/MakeDown4/test-rick-and-morty.git
    ```

2. Instale as dependências PHP:

    ```bash
    composer install
    ```

3. Instale as dependências JavaScript:

    ```bash
    npm install
    ```

6. Gere uma chave de aplicativo:

    ```bash
    php artisan key:generate
    ```


### Execução

- Para executar o servidor de desenvolvimento, execute o seguinte comando:

    ```bash
    php artisan serve
    ```

    Isso iniciará o servidor de desenvolvimento em `http://localhost:8000`.

- Para compilar os ativos JavaScript e CSS com vite, execute o seguinte comando em uma janela de terminal separada:

    ```bash
    npm run dev
    ```

    Isso irá iniciar o compilador de ativos e assistir a quaisquer mudanças nos arquivos JavaScript e CSS.

### Testes

Para executar os testes unitários, utilize o seguinte comando:

```bash
php artisan test