# Como Executar a Aplicação (Compatível com Windows)

Para colocar a aplicação online e testá-la, você precisará executá-la em um ambiente que tenha o **Node.js** instalado.

## Passo 0: Instalar o Node.js (Se Você Ainda Não Tiver)

*   **Para Windows:** A maneira mais fácil é ir ao site oficial: [https://nodejs.org/](https://nodejs.org/). Baixe a versão **LTS**, que é a mais estável. O instalador é um programa `.msi` normal, basta seguir os passos. Isso também instalará o `npm`, que é o gerenciador de pacotes do Node.js.
*   **Para Mac/Linux:** Você também pode usar o site oficial ou um gerenciador de pacotes como `nvm` ou `brew`.

Para verificar se a instalação funcionou, abra um novo terminal (no Windows, pode ser o 'Prompt de Comando' ou 'PowerShell') e digite `node --version`. Você deverá ver um número de versão.

## Passos para Execução Local

1.  **Obtenha o Código:**
    *   Primeiro, você precisa aprovar (fazer o "merge") da minha solicitação de "pull request" no repositório de código.
    *   Depois, baixe o código para o seu ambiente (usando `git pull` ou baixando o ZIP do projeto).

2.  **Instale as Dependências:**
    *   Abra um terminal ou prompt de comando na pasta do projeto.
    *   Execute o comando: `npm install`. Ele vai instalar todas as ferramentas que a aplicação precisa para funcionar.

3.  **Crie o Banco de Dados:**
    *   Antes de iniciar o servidor pela primeira vez, você precisa criar as tabelas no banco de dados. Para fazer isso, execute o seguinte comando no terminal:
    *   `node database.js`

4.  **Inicie o Servidor:**
    *   Agora, para ligar a aplicação, execute o comando:
    *   `node index.js`
    *   Você deverá ver uma mensagem no terminal dizendo `Server is running on http://localhost:3000`.

5.  **Acesse no Navegador:**
    *   Abra seu navegador de internet (Chrome, Firefox, etc.) e acesse o endereço: `http://localhost:3000`.
    *   Você verá a página inicial da aplicação e poderá começar a testar! O banco de dados será salvo em um diretório temporário do seu sistema operacional.
