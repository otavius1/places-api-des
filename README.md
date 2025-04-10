# 🌍 Places API 

API RESTful para gerenciamento de **lugares** (places)

## ✨ Como executar o projeto

### 1. Clonar o repositório

```bash
git clone https://github.com/otavius1/places-api.git
cd places-api
```

### 2. Copiar o arquivo `.env` com configurações Docker

```bash
cp .env.docker .env
```

### 3. Subir os containers com Docker

```bash
docker-compose up -d --build
```

> ⚠️ Na primeira vez, isso instalará dependências, rodará `php artisan migrate --seed` e iniciará o servidor Laravel em `http://localhost:8000`.

---

## 🧪 Rodando os testes

### Testes de API (Feature)

```bash
docker exec -it laravel_app php artisan test --filter=PlaceApiTest
```

### Testes unitários

```bash
docker exec -it laravel_app php artisan test --testsuite=Unit
```

### Todos os testes (comando customizado)

```bash
docker exec -it laravel_app php artisan test:places
```

## 📜 Endpoints disponíveis

| Método | Endpoint                  | Descrição                        |
|--------|---------------------------|----------------------------------|
| GET    | `/api/places`             | Lista todos os lugares           |
| GET    | `/api/places?q=rio`       | Busca lugares por nome           |
| GET    | `/api/places/{id}`        | Detalha um lugar por ID          |
| GET    | `/api/places/slug/{slug}` | Busca lugar por slug             |
| POST   | `/api/places`             | Cria um novo lugar               |
| PUT    | `/api/places/{id}`        | Atualiza um lugar existente      |
| DELETE | `/api/places/{id}`        | Remove um lugar                  |

> Todas as respostas são em **JSON**

---

## 📃 Exemplos de uso

### Criar lugar (`POST /api/places`)

```json
{
  "name": "Parque das Águas",
  "city": "Campinas",
  "state": "SP"
}
```

### Buscar por nome (`GET /api/places?q=parque`)

Retorna todos os lugares cujo nome contenha "parque".

### Buscar por slug (`http://127.0.0.1:8000/api/places/slug/parque-da-cidade`)

Retorna todos os lugares cujo nome contenha "parque".
---

## 🧰 Arquitetura

- `PlaceController` → Camada de rota/API
- `PlaceService` → Lógica de negócio
- `PlaceRepository` → Acesso a dados
- `Place` (Model) → Entidade base
- `Factory` + `Seeder` → População de dados

---

## 📂 Scripts úteis

```bash
# Ver tabelas no banco
docker exec -it postgres_db psql -U postgres -d places_db -c '\dt'

# Ver registros na tabela
docker exec -it postgres_db psql -U postgres -d places_db -c 'SELECT * FROM places;'

# Rodar migrations manualmente
docker exec -it laravel_app php artisan migrate --seed
```

---