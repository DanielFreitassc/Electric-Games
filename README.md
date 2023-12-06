# Documentação do Projeto Eletric Games

## Visão Geral do Projeto

O Eletric Games é um projeto desenvolvido por bolsistas de engenharia de computação e engenharia de software. O objetivo do projeto é criar uma plataforma online para a realização de competições entre alunos, onde professores podem criar perguntas e os alunos respondem, incluindo o envio de fotos como parte das respostas. O sistema é compatível com dispositivos móveis, como smartphones.

### Tecnologias Utilizadas
  - PHP para o backend
  - JavaScript para interatividade do frontend
  - HTML para a estrutura da página
  - CSS para a estilização

- **Servidor Web:**
  - Nginx foi utilizado para hospedar o site

## Funcionalidades Principais

### 1. Identificação de Usuários

- O site apresenta uma tela inicial com botões para os perfis "Aluno" e "Professor".
- Os usuários selecionam seu perfil (Aluno ou Professor) para acessar as funcionalidades correspondentes.

### 2. Tela do Aluno

- **Identificador de Equipe:**
  - Os alunos têm um identificador de equipe na tela, indicando a qual grupo eles pertencem.

- **Envio de Fotos:**
  - Os alunos podem enviar fotos associadas a quadrados numerados .
  - A cor do quadrado indica o status do envio: verde (liberado), amarelo (em análise pelo professor) e vermelho (bloqueado).

- **Feedback de Respostas:**
  - Se um aluno enviar uma foto da resposta da questão, o sistema exibirá um tela de sucesso.

### 3. Tela do Professor

- **Autenticação:**
  - O professor precisa fazer login com uma senha para acessar as funcionalidades de professor.

- **Visualização de Respostas:**
  - O professor pode ver as respostas enviadas pelos alunos.
  - Pode cadastrar o número da questão associada às respostas.

- **Marcação de Respostas:**
  - O professor pode marcar as caixas dos alunos como verde (liberado), amarelo (em análise) e vermelho (bloqueado) de acordo com os acertos das questões.

## Implementação Técnica

- **Backend:**
  - PHP foi utilizado para a lógica do servidor e interação com o banco de dados.

- **Frontend:**
  - JavaScript, HTML e CSS foram usados para criar a interface do usuário interativa e responsiva.

- **Servidor:**
  - Nginx foi configurado para hospedar o site, garantindo uma performance eficiente.

## Como Executar o Projeto

1. Clone o repositório do projeto.
2. Configure um servidor Nginx para hospedar o site.
3. Certifique-se de que o ambiente PHP está configurado corretamente.
4. Importe e configure o banco de dados, se aplicável.
5. Acesse o site pelo navegador.

## Considerações Finais

O Eletric Games oferece uma plataforma interativa para a realização de competições entre alunos e a avaliação das respostas pelos professores. Certifique-se de seguir as instruções de implementação para garantir o correto funcionamento do sistema. Em caso de dúvidas ou problemas, consulte a documentação ou entre em contato com a equipe de desenvolvimento.
> Daniel, Lourenço, Luis, Arthur.

