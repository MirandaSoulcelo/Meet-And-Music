# Projeto Meet and Music

## 📜 Escopo do Projeto
Este projeto tem como objetivo desenvolver uma aplicação que permite a interação entre usuários, com funcionalidades de login, cadastro e gerenciamento de lições. O foco é garantir uma experiência fluida e intuitiva para os usuários.

## 🛠️ Stacks Utilizadas
- **Backend**: Laravel (PHP)
- **Frontend**: Vite (JavaScript)
- **Banco de Dados**: SQLite
- **Gerenciamento de Dependências**: Composer
- **Containerização**: Docker e Docker Compose

## 🌿 Gerenciamento de Branches
Para garantir organização e consistência no desenvolvimento do projeto, seguiremos boas práticas de versionamento com Git.

### 🔹 Branches para Features (Novas Funcionalidades)
- Cada desenvolvedor deve criar sua branch no seguinte formato:

  **Exemplo**: `feature/nome-do-recurso`

  Todas as novas funcionalidades ou alterações que impactem a estrutura do código devem ser implementadas nesta branch.

### 🔹 Branches para Correções
- Correções devem ser realizadas em branches específicas para cada macro-área do projeto, utilizando a seguinte nomenclatura:
  
  **Exemplo**: `fix/nome-da-correção`

### 🔹 Branch de Produção
- **`prod` (Produção)**: Esta será a versão definitiva e mais atualizada do projeto. Todas as funcionalidades aprovadas, após passarem por testes nas branches `feature/nome-do-recurso`, serão integradas na branch `prod`.

🚀 Sempre que necessário, realizar um `git pull` na branch `prod` para garantir que o código esteja atualizado.

## 🚀 Como Rodar o Projeto (Utilizando Docker Compose)
1. **Instalação de Dependências**:
   - Certifique-se de que todas as dependências estão instaladas.
   - O arquivo `php.ini` deve estar configurado corretamente, incluindo as extensões necessárias.
   
2. **Configuração do Ambiente**:
   - Utilize a versão mais recente do PHP.
   - Ajuste as variáveis de ambiente do sistema para funcionar com o driver do MySQL e as extensões do PHP.
   
3. **Executar o Docker Compose**:
   - No terminal, execute o seguinte comando:
   ```bash
   docker-compose up --build
   ```
   - O servidor Laravel estará disponível em `http://localhost:8000` e o Vite em `http://localhost:5173`.

## 📝 Observações
- Certifique-se de que o Composer está instalado.
- Para realizar um commit corretamente, utilize o seguinte comando:
  ```bash
  git push --set-upstream origin feature/nome-do-recurso
  ```
  Esse comando deve ser executado antes de trocar para a branch `prod` pela primeira vez.