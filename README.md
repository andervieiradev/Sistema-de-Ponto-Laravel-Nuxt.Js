Projeto elaborado para o Teste Técnico da Ticto.

O projeto elaborado em duas partes.
1º Backend - API em Laravel
2º Frontend - Nuxt 2 (O Dashboard foi montado do zero)

Requisitos:
- Banco MySql
- PHP e Composer
- Node e NPM

```
    git clone https://andervieiradev@bitbucket.org/andervieiradev/teste-ticto.git

    dentro das pastas backend e frontend copiar o arquivo .env.example para .env e efetuar o preenchimento dos dados locais da maquina

    abre o terminal na pasta backend e execute os comandos:
    - composer install
    - php artisan serve
    - php artisan migrate
    - php artisan db:seed
    
    abre outro terminal na pasta frontend e roda:
    - npm install
    - npm run dev 
    
    
    irá criar 3 admins com os seguintes emails:
        admin1@teste.com
        admin2@teste.com
        admin3@teste.com

        as senhas são: password
    
    Irá criar alguns funcionários com emails rondômicos
```