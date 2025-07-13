📧 Projeto: App Send Mail – Envio de emails com PHP e PHPMailer

Este projeto é uma aplicação simples para enviar emails usando PHP e a biblioteca PHPMailer.  
Tem uma interface limpa feita com Bootstrap 5, onde o usuário pode preencher um formulário com destinatário, assunto e mensagem para enviar um email via SMTP.

⚠️ Atenção

- É necessário configurar seu email, usar **senha de app** e ter a **verificação em duas etapas** ativada na sua conta para usar o SMTP do Gmail.

📁 O que tem nos arquivos

- `index.php` → Página com o formulário para envio do email.  
- `Controller/ProcessaEnvio.php` → Script que processa o envio do email usando PHPMailer.  
- `Model/Mensagem.php` → Classe que representa a mensagem com validação e controle de status.
- `View/resposta.php` → View de resposta de status do email. 
- `composer.json` → Arquivo de configuração do Composer com as dependências do projeto.  

🚀 Tecnologias usadas

- PHP PHP 8.2.12  
- PHPMailer (envio de emails via SMTP)  
- Bootstrap 5 (interface limpa e moderna)  
- Composer (gerenciamento de dependências)  
