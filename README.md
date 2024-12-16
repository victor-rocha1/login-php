Cara, tipo assim, a gente costuma trabalhar em PHP usando uma estrutura MVC pra deixar o código mais organizado e fácil de manter, sabe? Quando o projeto é pequeno, dá pra fazer tudo num único arquivo e tá tranquilo. Só que conforme a aplicação cresce, fica muito mais fácil se a gente tiver as coisas separadas por responsabilidade. Então, seria legal você pensar em:

    Controllers: é onde a gente bota a lógica do que a aplicação faz, tipo autenticação, validação de dados, etc.
    Models: é onde ficam as classes que conversam com o banco de dados, fazendo as queries de forma mais segura, usando prepare, etc.
    Views: parte visual/HTML. Separa o front-end do back-end pra ficar fácil de dar manutenção.

Estrutura geral que eu recomendo

projeto-login-php/
├─ app/
│  ├─ Controllers/
│  │  └─ AuthController.php
│  ├─ Models/
│  │  └─ UserModel.php
│  ├─ Views/
│  │  ├─ login.php
│  │  ├─ home.php
│  │  └─ layout/
│  │     └─ header.php
│  └─ Helpers/
│     └─ Database.php
├─ public/
│  └─ index.php
├─ routes/
│  └─ web.php
├─ composer.json
└─ style.css

A ideia é simples:

    Dentro de app/Controllers, você teria o seu AuthController.php pra lidar com login, logout, cadastro, etc.
    Em app/Models ficaria o UserModel.php, que conversa com o banco (substituindo teu conexao.php antigo, agora dentro de uma classe de DB).
    As telas propriamente ditas (HTML/PHP) ficariam em app/Views (por exemplo, login.php pra tela de login e home.php pra tela depois que logar).
    O public/index.php serve como “ponto de entrada”, onde a galera normalmente faz o roteamento inicial (carregar o web.php, etc.).
    Em routes/web.php tu mapeia as URLs, tipo /login, /home, /auth, e chama os métodos corretos do seu AuthController.

Como funcionaria cada pedaço

    Database.php (em app/Helpers):
        Aqui fica a classe que faz a conexão com o MySQL. Daí você não precisa ficar abrindo conexão em cada arquivo, só chama Database::getConnection() e já tá tudo certo.
        Em produção, a gente costuma usar um arquivo .env ou variáveis de ambiente pra não deixar usuário e senha do banco expostos no repositório.

    UserModel.php:
        Recebe a conexão que vem da classe Database e faz as queries (SELECT, INSERT, etc.).
        Usa prepared statements pra evitar SQL injection, que é bem importante.

    AuthController.php:
        Lê os dados de login e senha do $_POST, chama o UserModel pra ver se o usuário existe ou pra criar um novo usuário.
        Decide se renderiza a tela de erro ou redireciona pra página home.
        A ideia do Controller é justamente juntar a lógica de negócio com a chamada do Model e o carregamento da View.

    Rotas (web.php):
        A gente cria um roteamento manual simples, tipo: se a URI for /login, chama AuthController->showLogin(), se for /auth e for POST, chama login() ou register().
        Isso evita ficar usando if e else em cada arquivo. Fica concentrado só num lugar.

    Views (login.php, home.php):
        Aqui você deixa a parte visual. Um HTML padrão, form de login, mensagem de boas-vindas, e por aí vai.
        Eventualmente, pode criar uma pasta layout pra colocar header.php e footer.php e reaproveitar código de interface.

Vantagens dessa organização

    Se alguém precisar alterar a lógica de login, a gente mexe só no AuthController.
    Se alguém precisar alterar a estrutura do banco, a gente só atualiza o UserModel.
    Se quiser mudar o HTML, a gente edita só os arquivos dentro de Views.

Isso tudo ajuda muito a dar manutenção se o projeto crescer. Então é basicamente isso: separar o que cada parte faz e manter o código mais limpo e escalável. Se precisar de algo mais, a gente consegue evoluir essa arquitetura de boas.
