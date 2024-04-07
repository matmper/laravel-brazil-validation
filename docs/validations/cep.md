# Documentos (CPF e CNPJ)

| Validação | Descrição |
|---|---|
| cep | valida o valor de um CEP, ignorando valores não numéricos |
| cep:mask | validates CEP value and format (00000-000) |

**Example**
```php
// 00000000000          -> true
// 000.000.000-00       -> true
// 00000000000000       -> true
// 00.000.000/0000-00   -> true
return ['document_number' => 'document'];
return ['document_number' => 'document:cpf.cnpj'];

// 00000000000          -> true
// 000.000.000-00       -> true
// 00000000000000       -> false
// 00.000.000/0000-00   -> false
return ['cpf' => 'document:cpf'];

// 00000000000          -> false
// 000.000.000-00       -> false
// 00000000000000       -> false
// 00.000.000/0000-00   -> true
return ['cnpj' => 'document:cnpj,mask'];

// hello world          -> true
// <p>hello world</p>   -> false
return ['content' => 'string|not_html'];
```
