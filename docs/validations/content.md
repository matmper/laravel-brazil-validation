# Documentos (CPF e CNPJ)

| Validação | Descrição |
|---|---|
| not_html | valida que uma string não contenha html |

## Exemplos:

```php
// hello world          -> true
// <p>hello world</p>   -> false
return ['content' => 'string|not_html'];
```
