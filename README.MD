 Sistema de Agendamento - Petshop AUmigos

Este projeto é um sistema web para gerenciamento de clientes e pets de um petshop, permitindo realizar as operações completas de CRUD (Create, Read, Update, Delete) com banco de dados MySQL relacional.

 Funcionalidades

CRUD de Clientes: Cadastro, listagem, edição e exclusão de tutores.
CRUD de Animais: Cadastro, listagem, edição e exclusão dos pets associados a um tutor.
Relacionamento no Banco de Dados: Relacionamento de Chave Estrangeira (`FOREIGN KEY`) entre `clientes` e `pets` com exclusão em cascata (`ON DELETE CASCADE`).



Pré-requisitos

Para executar o sistema localmente, você precisará de um ambiente de servidor PHP/MySQL instalado, como o **XAMPP**, **WAMP** ou **Laragon**.

 Passo a Passo para Execução Local

Clonar ou baixar o repositório:
   Coloque a pasta do projeto dentro do diretório do seu servidor local:
   C:\xampp\htdocs\Petshop

Configurar o Banco de Dados:
   Inicie os serviços do Apache e MySQL no XAMPP Control Panel.
    Acesse o phpMyAdmin: http://localhost/phpmyadmin
    Vá na aba **SQL** e execute os comandos de criação do banco e das tabelas presentes no script SQL.

Acessar a Aplicação:
   Abra o navegador e digite o endereço:
http://localhost/Petshop/index.php