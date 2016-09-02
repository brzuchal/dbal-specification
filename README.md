Doctrine DBAL query by Specification
====================================================================

This example shows adaptation of Specification pattern for querying.

![PHP 7.0](https://img.shields.io/badge/PHP-7.0-8C9CB6.svg?style=flat)

---

## Usage

Firstly install dependencies with Composer

```
composer install
```

## Example

After dependencies insert data into database and run [test.php](test.php) script.

```php
use SpeciticationTest\Repository\Specification\User\CreatedAfter;
use SpeciticationTest\Repository\Specification\User\IsAdmin;
use SpeciticationTest\Repository\UserRepository;

$userRepository = new UserRepository($conn);

$isAdmin = new IsAdmin();

$dateTime = DateTime::createFromFormat('Y-m-d H:i:s', '2016-09-02 08:38:41');
$createdAfter = new CreatedAfter($dateTime);

$results = $userRepository->findAllBySpecification($isAdmin->and($createdAfter));
```

## License

The MIT License (MIT)

Copyright (c) 2016 Michał Brzuchalski <michal.brzuchalski@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.