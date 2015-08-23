Git web hook composer install
===

Installer git-web-hook for composer project 

Require
-------

- amaxlab/git-web-hook >= ~0.1.x-dev
- monolog/monolog >= ~1.13

Install
-------
1. Create project
``` bash
$ composer create-project amaxlab/git-web-hook-composer-install ./git-web-hook --prefer-dist --stability="dev"
```

2. Create configuration
Use config/config.yml.dist as example to create you own configuration file. More in library [documentation](https://github.com/amaxlab/git-web-hook)

3. Add hook in project settings on github or gitlab
```
http://yourhost/hook.php?mySecurityCode=GjnfkrjdsqKfvgjcjc
```
It is really important to use security codes which can be defined in config.yml

License
--------
This library is under the MIT license. See the complete license in [here](https://github.com/amaxlab/git-web-hook/blob/master/LICENSE)
