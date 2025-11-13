# Projeto Laravel com Docker


- [http://localhost:8075](http://localhost:8075)

**Usuário:** `root`  
**Senha:** `root`

## Acesso ao Backend

- [http://localhost:8005/api](http://localhost:8005/api)


```bash
docker compose up -d
```


   
   ```bash
   docker compose exec --user 1000:1000 app sh
   ```
   

   
   ```bash
   composer update
   ```

   
   ```bash
   php artisan key:generate
   ```


   
   ```bash
   php artisan migrate
   ```
---

## 🧠 Sobre o Projeto

O **Sistema de Gestão de Ativos Móveis (GAM)** é uma API desenvolvida em **Laravel**, com foco em segurança e integridade de dados.  
Seu objetivo é gerenciar usuários, produtos, endereços e transferências, garantindo que todas as operações sejam autenticadas e rastreáveis.

O sistema foi construído dentro de um ambiente **Dockerizado**, utilizando **Laravel Sanctum** para autenticação por token e **PHPUnit** para testes automatizados.

---

## ⚙️ Funcionalidades Principais

- Cadastro e autenticação de usuários (login e registro)
- Criação e gerenciamento de endereços
- Cadastro, edição e exclusão de produtos
- Registro de ativos (bens) e controle de transferências
- Sistema de permissões com administrador e usuário comum
- Validação rigorosa de dados (latitude, longitude, valor, senha, etc.)

---

## 🧩 Estrutura de Testes

O projeto foi testado com o **framework PHPUnit**, garantindo qualidade e estabilidade.  
Foram implementados os seguintes tipos de testes:

### 🔸 Testes Unitários (6)
Validam pequenas partes da aplicação isoladamente:
- `EmailValidationTest`
- `PasswordValidationTest`
- `LatitudeValidationTest`
- `LongitudeValidationTest`
- `ProductValueTest`
- `TransferBalanceTest`

### 🔸 Testes de Integração (4)
Verificam a comunicação entre partes do sistema:
- `UserLoginTest`
- `UserRegisterTest`
- `ProductCreationTest`
- `TransferProcessTest`

---

## 🧪 Resultados dos Testes

- ✅ 17 testes passaram com sucesso.
- ⚠️ 5 testes falharam por:
    - Falta da view `auth.login` (frontend não implementado).
    - Ausência da coluna `saldo` na tabela `users`.
    - Falhas esperadas em autenticação e autorização.

### 🛠️ Possíveis Correções
- Criar a view `auth.login` para testes de rota raiz (`/`).
- Adicionar a coluna `saldo` na migration `users`.
- Ajustar regras de autenticação no `ProductCreationTest`.

---

## 📚 Tecnologias Utilizadas

- **PHP 8.2**
- **Laravel 10**
- **Laravel Sanctum**
- **PHPUnit**
- **Docker / Docker Compose**
- **SQLite (testes)** / **MySQL (produção)**

---

## 🧾 Créditos e Autores

- **Desenvolvido por:** Kramer e Xenxen
- **Disciplina:** Qualidade de Software
- **Professor(a):** [Nome da docente]
- **Semestre:** 2025/2

---

## 🧱 Execução do Projeto (Resumo)

```bash
docker compose up -d
docker compose exec app bash
composer update
php artisan key:generate
php artisan migrate
php artisan test
