# Conteúdo

A validação de conteúdo realiza validações regex de conteúdos permitidos ou bloqueados dentro de uma string válida.

## Not HTML

| Tipo | Valor | Descricao |
|---|---|---|
| Nome | not_html | Bloqueia o uso de tag HTML no conteúdo |

**Exemplos:**

```php
$request->validate(['content'  =>  'not_html']);
```
| - | Valor de entrada (Input) |
|-|-|
| ✔️ | `hello world` |
| ❌ | `<p>hello world</p>` |
