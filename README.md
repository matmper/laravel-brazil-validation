# Laravel Brazil Validation 🇧🇷

Composer package for request brazilian field validation for Laravel

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

# Dependences
- PHP >= 8.0.2 ([Doc](https://www.php.net/releases/8.0/pt_BR.php))
- Laravel >= 9 ([Doc](https://laravel.com/docs/9.x/releases))

# Install

Install composer package and publish:

```bash
# install package
$ composer require matmper/laravel-brazil-validation

# publish package
$ php artisan vendor:publish --provider="Matmper\Providers\ValidationProvider"
```

# Usage

| Name | Validation | Description |
|---|---|---|
| DOCUMENT| document | validate CPF or CNPJ value, ignore non numeric char |
| - | document:cpf  | validate CPF value, ignore non numeric char |
| - | document:cpf,mask  | validate CPF value and format (000.000.000-00) |

**Example**
```php
// 00000000000          -> true
// 000.000.000-00       -> true
// 00000000000000       -> true
// 00.000.000/0000-00   -> true
return ['document_number' => 'document'];
return ['document_number' => 'document:cpf|cnpj'];

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

| laravel-brazil-validation version | Laravel versions |
|---|---|
| 1.x  | 9 / 10 |

## Contribution & Development

This is an open source code, free for distribution and contribution.
All contributions will be accepted only with Pull Request and that pass the test and code standardization.

Run composer install in yout development env:
```bash
$ composer install --dev --prefer-dist
```

Now you can use `composer check` in your terminal.
