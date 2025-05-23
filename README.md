# 🧪 Teste Técnico – Vaga Desenvolvedor PHP

Este repositório contém a implementação de um teste técnico proposto para avaliação de habilidades na vaga de **desenvolvedor PHP**. O projeto foi desenvolvido com foco em **boas práticas**, **estrutura organizada** e **validações seguras**.

---

## 🚀 Tecnologias Utilizadas

- PHP (versão 8.2)
- Laravel (versão 12.0)
- Livewire (versão ^3.6)
- MySQL / MariaDB
- Bootstrap
- Composer

---

## ⚙️ Funcionalidades Implementadas

- ✅ CRUD completo de [**tickets** | **categories**]
- ✅ Validações robustas com `FormRequest`
- ✅ Validação cruzada de entidades (ex: categoria por nome)
- ✅ Mensagens de erro amigáveis
- ✅ Organização clara por camadas
- ✅ Controle de exceções e fallback de erros

---

## 🛠️ Como rodar o projeto

### 1. Clone o repositório

```bash
git clone https://github.com/viniciussilva-s/ProjectLiveWire.git
cd ProjectLiveWire
```

### 2. Instale as dependências PHP

```bash
composer install
```

### 3. Configure o `.env`

Copie o `.env.example` e atualize as configurações:

```bash
cp .env.example .env
```

Configure suas credenciais de banco de dados no `.env`.

### 4. Gere a chave da aplicação

```bash
php artisan key:generate
```

### 5. Execute as migrações

```bash
php artisan migrate
```

### 6. (Opcional) Popule o banco com dados fictícios

```bash
php artisan db:seed
```

### 7. Inicie o servidor local

```bash
php artisan serve
```

### 8. Para teste unit

```bash
php artisan test
```


---

## 📝 Observações

- Projeto desenvolvido exclusivamente para fins de avaliação técnica.
- Estrutura preparada para fácil expansão.
- Código comentado e com foco em legibilidade.

---

## 📫 Contato

Caso tenha qualquer dúvida ou deseje discutir sobre este projeto:

- **Vinicius Souza**
- [LinkedIn](https://www.linkedin.com/in/vinicius-souza-318673b7/)

---
