# Bivi
##### php/Codeigniter script which let to students download thesis of degree. Is a Virtual Library platform (Prototype)

....
![Bivi](https://github.com/aleoreina/bivi/blob/master/screenshots/Screenshot_2020-03-14%20BIVI-ResultSearch.png?raw=true)
....

### Features:
- Spanish interface
- Search prototype initial : This let search in form basic all thesis and work degree by category and year .. or both ways.
- Admin Login Panel
- Administration Panel
- Add Categories and Add data
- Add Files by categories.
- Delete Categories
- Delete Files


### Need to improve:
- Is needed a system of Lang
- Encrypt system for users
- Need a module to add, delete users
- Need a roles permissions for users
- All view need connect roles permissions for users.
- Is needed enter in modular structure (backend code)

### Installation:
1) Copy all files from /webapp/ to your root webspace (Make sure a empty root folder).
2) Upload database from /db/php-library-virtual-university.sql
3) Go to your root webspace /application/config/config.php
and set up

    $config['base_url'] = 'http://127.0.0.1/';
    

Replace base_url with your full url
4) Go to your root webspace /application/config/database.php
and set up
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'php-library-virtual-university',
            'dbdriver' => 'mysqli',

5) All must be done go to your base_url .. in my case is http://127.0.0.1

### Donations
You can send me a donation for me on my paypal:
[Donate to Angel](https://paypal.me/aleoreina "Donate to Angel")

## License
** MIT **
Check file: LICENSE
