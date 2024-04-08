# Laravel Brazil Validation 🇧🇷

Pacote Composer para Laravel - Validação de campos e valores brasileiro

<p align="center">
    <a href="https://github.com/matmper/laravel-brazil-validation/pulls">
        <img src="https://img.shields.io/badge/PRs-welcome-brightgreen.svg" alt="PRs Welcome">
    </a>
    <a href="https://github.com/matmper/laravel-brazil-validation/actions/workflows/github_actions.yml?query=branch%3Amain+event%3Apush">
        <img src="https://github.com/matmper/laravel-brazil-validation/actions/workflows/github_actions.yml/badge.svg?event=push" alt="License MIT">
    </a>
    <a href="https://opensource.org/license/mit/" target="_blank">
        <img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License MIT">
    </a>
</p>

# Dependências

- PHP >= 8.0.2 ([Doc](https://www.php.net/releases/8.0/pt_BR.php))
- Laravel >= 9 ([Doc](https://laravel.com/docs/9.x/releases))
- Composer ([Doc](https://getcomposer.org/))

# Instalação

Instale o pacote em sua aplicação e publique para utilização:

```bash
# Instale a dependência
$ composer require matmper/laravel-brazil-validation

# Publique o pacote em sua aplicação
$ php artisan vendor:publish --provider="Matmper\Providers\ValidationProvider"
```

# Utilização

A partir do momento que o pacote se encontra publicado, a utilização é padrão a qualquer validação já existente no
Laravel, utilizando o recurso de `validate` informando os valores e parâmetros.

```php
$request->validate([
    'user_document_number' => 'document:cnpj,mask',
]);
```

Mais detalhes na documentação oficial: [Laravel Validation](https://laravel.com/docs/11.x/validation)
