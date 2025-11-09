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
