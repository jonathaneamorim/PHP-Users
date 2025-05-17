# Projeto - Prova de Programação Web 2

## Solving problems 
- Senha do mysql:
    - Para alterar a senha do Mysql utilizando o XAMPP e o phpmyadmin:
        - Criar uma query no phpmyadmin e utilizar o comando: 
            `SET PASSWORD FOR root@localhost = PASSWORD('your_new_password');`
        - Ou utilizar o shell do XAMPP:
            `mysqladmin -u root password`
    - Após alterar a senha do mysql é necessário atualizar a senha no arquivo php.ini (Geralmente localizada dentro da pasta do XAMPP/phpmyadmin/config.inc.php). Após acessar o arquivo alterar a linha:
        `$cfg['Servers'][$i]['password'] = 'PASSWORD';`

- Rodar php sem o XAMPP:
    - Acessar a pasta HTDOCS, abrir o terminal e executar o comando:
        `php -s localhost:8000`