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
![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/a90d0302-3488-4d61-b91b-e2a935cc72ad)

- Os usuários selecionam seu perfil (Aluno ou Professor) para acessar as funcionalidades correspondentes.

### 2. Tela do Aluno

- **Identificador de Equipe:**
  - Os alunos têm um identificador de equipe na tela, indicando a qual grupo eles pertencem.
    ![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/9bda0ea5-e9cd-4b4e-ae7e-507b5d14afb3)
- **Tela Do Aluno:**
  - Os alunos tem uma tela específica para celular.
    ![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/0a8aec2b-f55a-4863-84da-0d964f1993b6)
- **Envio de Fotos:**
  - Os alunos podem enviar fotos associadas a quadrados numerados .
  ![enviar](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/3a372bf1-c47b-4f92-bf9c-f178fbd8532a)

  - A cor do quadrado indica o status do envio: verde (liberado), amarelo (em análise pelo professor) e vermelho (bloqueado).

- **Feedback de Respostas:**
  - Se um aluno enviar uma foto da resposta da questão, o sistema exibirá um tela de sucesso.
  ![sucess](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/cbf07333-7591-417d-93af-bb8cd8db7544)

### 3. Tela do Professor

- **Autenticação:**
  - O professor precisa fazer login com uma senha para acessar as funcionalidades de professor.
![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/fdef0296-2343-4abf-bb7b-c958c3a0c9a8)
- **Tela Do Professor Própia Para Computadores**
  ![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/37b87193-5314-4c7b-8f54-56399ef219d1)
 
- **Visualização de Respostas:**
  - O professor pode ver as respostas enviadas pelos alunos.
    ![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/6591197d-c4e3-4364-9372-0afefc495507)

  - Pode cadastrar o número da questão associada às respostas.
  ![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/01129d66-7605-4297-a8a0-e65ddd11e19b)

- **Marcação de Respostas:**
  - O professor pode marcar as caixas dos alunos como verde (liberado), amarelo (em análise) e vermelho (bloqueado) de acordo com os acertos das questões.

   ![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/2a823eef-db1b-4502-9e8e-5c318e521d78)

  
    ![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/d25364a5-3d90-4056-b633-1984b9c8a499)

### 3. Tela Para Projetores
- **Visualização do andamento das questões em uma tela separada só para isso**

  ![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/db702331-1da4-4557-9ca1-fe72939b575b)


  ![image](https://github.com/DanielFreitassc/Electric-Games/assets/129224303/cf707fda-3df8-4d8f-bdd6-e0ef9f95c052)



## Implementação Técnica

- **Backend:**
  - PHP foi utilizado para a lógica do servidor e interação com o banco de dados.

- **Frontend:**
  - JavaScript, HTML e CSS foram usados para criar a interface do usuário interativa e responsiva.

- **Servidor:**
  - Nginx foi configurado para hospedar o site, garantindo uma performance eficiente.

## Como Executar o Projeto
1. Configure um servidor Nginx para hospedar o site.
2. Clone o repositório do projeto.
3. Certifique-se de que o ambiente PHP está configurado corretamente.
4. Acesse o site pelo navegador.

## Considerações Finais

O Eletric Games oferece uma plataforma interativa para a realização de competições entre alunos e a avaliação das respostas pelos professores. Certifique-se de seguir as instruções de implementação para garantir o correto funcionamento do sistema. Em caso de dúvidas ou problemas, consulte a documentação ou entre em contato com a equipe de desenvolvimento.
> Daniel, Lourenço, Luis, Arthur.

