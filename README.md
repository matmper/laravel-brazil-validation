# Laravel Brazil Validation 🇧🇷

Composer package for request brazilian field validation for Laravel

<a
href="https://github.com/matmper/laravel-brazil-validation/pulls">
    <img src="https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=for-the-badge" alt="PRs Welcome">
</a><a 
href="https://packagist.org/packages/matmper/laravel-brazil-validation">
    <img src="https://img.shields.io/packagist/v/matmper/laravel-brazil-validation?style=for-the-badge&color=%23b6e673" alt="Packagist">
</a><a
href="https://github.com/matmper/laravel-brazil-validation/actions/workflows/github_actions.yml?query=branch%3Amain">
    <img src="https://img.shields.io/github/actions/workflow/status/matmper/laravel-brazil-validation/github_actions.yml?branch=main&style=for-the-badge" alt="Github Actions">
</a><a
href="https://opensource.org/license/mit/" target="_blank">
    <img src="https://img.shields.io/badge/license-MIT-blue.svg?style=for-the-badge" alt="License MIT">
</a>

# Dependences

- PHP >= 8.0.2 ([Doc](https://www.php.net/releases/8.0/pt_BR.php))
- Laravel >= 9 ([Doc](https://laravel.com/docs/9.x/releases))
- Composer ([Doc](https://getcomposer.org/))

# Install

Install composer package and publish:

```bash
# install package
$ composer require matmper/laravel-brazil-validation

# publish package
$ php artisan vendor:publish --provider="Matmper\Providers\ValidationProvider"
```

# Documentation

| laravel-brazil-validation version | Laravel versions |
|---|---|
| 1.x  | 9 / 10 / 11 |

Access: [Complete Documentation](https://matmper.github.io/laravel-brazil-validation)

## Contribution & Development

This is an open source code, free for distribution and contribution.
All contributions will be accepted only with Pull Request and that pass the test and code standardization.

Run composer install in yout development env:
```bash
$ composer install --dev --prefer-dist
```

Now you can use `composer check` in your terminal.
