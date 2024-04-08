# Documentos

Validação dos principais tipo de documentos e seus formatos encontrados em território brasileiro.

**Importante:** *a validação de documentos é feita de forma matemática, impedindo o uso de valores aleatórios, não é realizado verificações com banco de dados governamentais ou oficiais para garantir a existência e o uso deste documento.*

## CPF & CNPJ

| Tipo | Valor | Descricao |
|---|---|---|
| Nome | document_number | Validação de CPF ou CNPJ |
| Parâmetro | cpf | Garante que o valor seja um CPF |
| Parâmetro | cnpj | Garante que o valor seja um CNPJ |
| Parâmetro | mask | Garante que o valor seja formatado |

**Exemplos:**

```php
$request->validate(['document_number' => 'document']);
$request->validate(['document_number' => 'document:cpf.cnpj']);
```
| - | Valor de entrada (Input) |
|-|-|
| ✔️ | 00011122299 |
| ✔️ | 000.111.222-99 |
| ✔️ | 00111222000199 |
| ✔️ | 00.111.222/0001-99 |

---

```php
$request->validate(['cpf' => 'document:cpf']);
```
| - | Valor de entrada (Input) |
|-|-|
| ✔️ | 000.111.222-99 |
| ✔️ | 00011122299 |

---

```php
$request->validate(['cpf' => 'document:cpf,mask']);
```
| - | Valor de entrada (Input) |
|-|-|
| ✔️ | 000.111.222-99 |

---

```php
$request->validate(['cnpj' => 'document:cpf']);
```
| - | Valor de entrada (Input) |
|-|-|
| ✔️ | 00.111.222/0001-99 |
| ✔️ | 00111222000199 |

---

```php
$request->validate(['cnpj' => 'document:cpf:mask']);
```
| - | Valor de entrada (Input) |
|-|-|
| ✔️ | 00.111.222/0001-99 |
