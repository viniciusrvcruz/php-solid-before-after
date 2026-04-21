# PHP: SOLID — antes e depois

Exemplo educativo de refatoração de um fluxo de reserva de salas: uma versão **legada** com responsabilidades acopladas (`src/Before`) e uma versão **refatorada** com separação de papéis, contratos e extensão por composição (`src/After`).

O objetivo é ilustrar, no código, o que mudança de design orientada a SOLID costuma significar na prática, não é um framework nem um produto, é um **estudo comparativo** adequado para leitura e discussão.

O exercício original foi proposto na disciplina **Arquitetura Moderna** da minha pós-graduação; este repositório é a versão que mantenho como material de referência.

## Requisitos

- **PHP** 8.1 ou superior (uso de `enum`, named arguments e `strict_types`), ou
- **Docker** com Docker Compose, para executar via imagem oficial do Composer (inclui PHP).

## Instalação

Clone o repositório e instale o autoload do Composer.

**Local (PHP instalado na máquina):**

```bash
composer install
```

**Com Docker (sem PHP local):**

```bash
docker compose run --rm php-solid composer install
```

## Execução

**Com PHP local** (após `composer install`):

```bash
php src/Before/index.php
php src/After/index.php
```

**Com Docker** (equivalente aos scripts do repositório):

```bash
./run-before.sh
./run-after.sh
```

Ou diretamente:

```bash
docker compose run --rm php-solid php src/Before/index.php
docker compose run --rm php-solid php src/After/index.php
```

## Estrutura

| Caminho | Conteúdo |
|--------|----------|
| `src/Before` | Serviço legado concentrando validação, disponibilidade, preço, pagamento e notificação |
| `src/After` | Entidades, validadores, repositório, serviços de domínio, estratégias de pagamento e notificação com interfaces |

Compare os dois pontos de entrada (`index.php`) para ver como a orquestração muda quando as responsabilidades são distribuídas.

## Autor

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/viniciusrvcruz" target="_blank" rel="noopener noreferrer">
        <img src="https://github.com/viniciusrvcruz.png" width="80px;" alt="Vinicius Cruz"/><br>
        <sub><b>Vinicius Cruz</b></sub>
      </a><br>
      <a href="https://github.com/viniciusrvcruz" title="GitHub" target="_blank" rel="noopener noreferrer">
        <img src="https://skillicons.dev/icons?i=github" width="25px" />
      </a>
      <a href="https://www.linkedin.com/in/viniciuscruz7" title="LinkedIn" target="_blank" rel="noopener noreferrer">
        <img src="https://skillicons.dev/icons?i=linkedin" width="25px" />
      </a>
    </td>
  </tr>
</table>
