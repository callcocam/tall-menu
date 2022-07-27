#TAL REPORT TABLE

Pacote para gerar menu dinamicamente

#INSTALL MIGRATE

```
./vendor/bin/sail artisan migrate

```

#INSTALL SORTABLE 

```
https://github.com/livewire/sortable

./vendor/bin/sail npm i livewire-sortable --save-dev

ALTER app.js
...
import './bootstrap';

import 'livewire-sortable';//add import slivewire-sortable resourses/js/app.js

...    

```
#ALTERANDO o TAILWIND CONFIG
```
....
module.exports = {
   ...
    content: [
        ...
        './vendor/callcocam/menu/resources/views/**/*.blade.php',
        ....
    ],
....
};
    
```

#PUBLICAR AS FACTORIES E SEEDERS

```
./vendor/bin/sail artisan vendor:publish --tag=menu-factories --force
 or 
sail artisan vendor:publish --tag=menu-factories --force

  
```