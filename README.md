# open-source-evangelists

[![Build Status](https://travis-ci.org/andela-iadeniyi/open-source-evangelists.svg)](https://travis-ci.org/andela-iadeniyi/open-source-evangelists)
[![License](http://img.shields.io/:license-mit-blue.svg)](https://github.com/andela-iadeniyi/open-source-evangelists/blob/master/LICENSE)
[![Quality Score](https://img.shields.io/scrutinizer/g/andela-iadeniyi/open-source-evangelists.svg?style=flat-square)](https://scrutinizer-ci.com/g/andela-iadeniyi/open-source-evangelists)

This Package analysis the contributions of a Github users based on the number of repositories a user has.
It also ranks the user based on the author's perspective on the number of repositories individual user has.
The ranking is shown bellow:

` Number of Repository < 5 - Zero Evanglist`

` 5 <= Number of Repository <= 10 - Junior Evanglist`

` 11 <= Number of Repository <= 20 - Associate Evanglist`

` Number of Repository >= 21 - Senior Evanglist`


## Installation

[PHP](https://php.net) 5.5+ and [Composer](https://getcomposer.org) are required.

Via Composer

```
$ composer require ibonly/github-status-evangelists
```

```
$ composer install
```

## Usage 1
```
use Ibonly\GithubStatusEvangelist\EvangelistStatus;
```
```
$status = new EvangelistStatus($username);
```
Note that $username is the GitHub username of the individual.

```
$status->getStatus();
```

## Usage 2

To catch if the username entered is not a github user

```
use Ibonly\GithubStatusEvangelist\EvangelistStatus;
use Ibonly\GithubStatusEvangelist\NullUserException;
```
Note that $username is the GitHub username of the individual.

```
try {
    $status = new EvangelistStatus($username);
} catch (NullUserException $e){
    echo $e->errorMessage();
}
```

```
$status->getStatus();
```

## Testing
```
$ vendor/bin/phpunit test
```

## Contributing
To contribute and extend the scope of this package,
Please check out [CONTRIBUTING](CONTRIBUTING.md) file for detailed contribution guidelines.

## Credits

Open-source-Evangelist is created and maintained by `Ibraheem ADENIYI`.