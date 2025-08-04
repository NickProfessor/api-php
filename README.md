# API de gerenciamento de usuários

### 1. Introdução

Está API permite o gerenciamento de usuários. As operações disponíveis são:

- "Listar usuários"
- "Buscar usuários pelo ID"
- "Criar usuário"
- "Atualizar usuário"
- "Remover usuário"

### 2. 🔐 Autenticação

Nenhuma (por enquanto).

### 3. HTTP requests

✅ GET /usuarios
Descrição: Lista todos os usuários cadastrados.

Resposta de sucesso (_200_):

```
[
  {
    "id": 1,
    "nome": "João da Silva",
    "email": "joao@email.com"
  }
]

```

✅ GET /usuarios/{id}
Descrição: Retorna o usuário informado pelo ID.

**Parâmetros:**

- id (obrigatório): inteiro

Resposta de sucesso (_200_):

```
[
  {
    "id": 1,
    "nome": "João da Silva",
    "email": "joao@email.com"
  }
]

```

Resposta caso não encontrado (_400_):

```
[
  {
    "mensagem": "Usuário não encontrado"
  }
]

```

✅ POST /usuarios
Descrição: Cria um novo usuário.

**Body (JSON):**

```
{
  "nome": "Maria Souza",
  "email": "maria@email.com"
}
```

**Respostas:**

_201 Created:_

```
{
  "mensagem": "Usuário criado com sucesso"
}
```

_400 Bad Request (validação):_

```
{
  "erro": "Nome e email são obrigatórios"
}
```

✅ PUT /usuarios/{id}
Descrição: Atualiza os dados de um usuário.

**Parâmetros:**

- id: obrigatório, inteiro

**Body (JSON):**

```
{
  "nome": "Maria Souza",
  "email": "maria@email.com"
}
```

Resposta:

_200 OK_

```
{
  "mensagem": "Usuário atualizado com sucesso"
}
```

_400 Bad Request (validação):_

```
{
  "erro": "Dados insuficientes"
}
```

✅ DELETE /usuarios/{id}
Descrição: Exclui um usuário.

**Parâmetros:**

- id: obrigatório

Resposta:

_200 OK_

```
{
"mensagem": "Usuário deletado com sucesso"
}
```

_404 Not Found_

```
{
"mensagem": "Usuário não encontrado"
}
```
