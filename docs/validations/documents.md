# Documentos (CPF e CNPJ)

| Validação | Descrição |
|---|---|
| document | valida o valor de CPF ou CNPJ, ignorando valores não numéricos  |
| document:cpf | validar o valor de um CPF, ignorando valores não numéricos |
| document:cpf,mask | valida o valor e o formato de um CPF (000.000.000-00) |

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
```
