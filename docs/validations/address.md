
# Endereço

A validação de endereço permite o complemento de dados válidos e completos de localização.

## CEP

| Tipo | Valor | Descricao |
|---|---|---|
| Nome | cep | Validação de CEP |
| Parâmetro | mask | Garante que o valor seja formatado |

**Exemplos:**

```php
$request->validate(['content' => 'cep']);
```
| - | Valor de entrada (Input) |
|-|-|
| ✔️ | 10000200 |
| ✔️ | 10000-200 |

```php
$request->validate(['content' => 'cep:mask']);
```
| - | Valor de entrada (Input) |
|-|-|
| ✔️ | 10000-200 |
