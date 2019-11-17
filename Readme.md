API POKER

Installation :

1:

PHP : https://www.php.net/downloads.php


Composer : https://getcomposer.org/Composer-Setup.exe
Puis mettre la variable d'environnement

Pour tester si ca fonctionne :

    composer -V
2:

Dans un terminal :

    composer global require laravel/installer


Pour ensuite lancer le projet :

    php artisan serve




=====================================
Dans le code :

DOCUMENTATION LARAVEL :

https://laravel.com/docs/5.8 Section "Eloquent ORM" (Ca nous permet de créé et structuré notre API facilement)


Dossier "database/migration" : Différentes tables de la bdd créées automatiquement lors de la commande
    
    php artisan migrate

Dossier "app" : Dossier de l'application PHP. Ici sont stocké tous nos models (Action.php , Card.php , ect....)

Quesqu'il reste a faire ? S'occuper d'envoyer les resources dans la bdd avec la fonction .create (voir doc Laravel) et de les recuperer , puis créer leurs endpoints.
        