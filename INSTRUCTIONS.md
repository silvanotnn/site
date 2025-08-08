# Como Executar a Aplicação

Para colocar a aplicação online e testá-la, você precisará executá-la em um ambiente que tenha o Node.js instalado. Pode ser no seu próprio computador ou em um servidor na nuvem.

## Passos para Execução Local

1.  **Obtenha o Código:**
    *   Primeiro, você precisa aprovar (fazer o "merge") da minha solicitação de "pull request" no repositório de código.
    *   Depois, baixe o código para o seu ambiente (usando `git pull` ou baixando o ZIP do projeto).

2.  **Instale as Dependências:**
    *   Abra um terminal ou prompt de comando na pasta do projeto.
    *   Execute o comando: `npm install`. Ele vai instalar todas as ferramentas que a aplicação precisa para funcionar (Express, EJS, etc.).

3.  **Crie o Banco de Dados:**
    *   Antes de iniciar o servidor pela primeira vez, você precisa criar as tabelas no banco de dados. Para fazer isso, execute o seguinte comando no terminal:
    *   `node database.js`

4.  **Inicie o Servidor:**
    *   Agora, para ligar a aplicação, execute o comando:
    *   `node index.js`
    *   Você deverá ver uma mensagem no terminal dizendo `Server is running on http://localhost:3000`.

5.  **Acesse no Navegador:**
    *   Abra seu navegador de internet (Chrome, Firefox, etc.) e acesse o endereço: `http://localhost:3000`.
    *   Você verá a página inicial da aplicação e poderá começar a testar!

## Dica para Servidor Online (Avançado)

*   Se você estiver fazendo isso em um servidor online (como DigitalOcean, AWS, etc.), você precisará usar o endereço de IP do servidor em vez de `localhost` e garantir que a porta `3000` esteja liberada no firewall.
*   Para manter a aplicação rodando 24/7, é recomendado usar uma ferramenta como o `pm2`. Depois de instalar o `pm2` (`npm install pm2 -g`), você pode iniciar a aplicação com `pm2 start index.js` e ele cuidará de mantê-la online.
