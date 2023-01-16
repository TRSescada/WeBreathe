
*Dans ce projet vous pouvez utlisée l'url :(localhost:PORT/modules) pour accéder à la page main là ou on affiche les modules.

*Tout d'abord il faut connecter l'application à votre base de données

*Pour créer un nouveau module on le fais en clickant sur le bouton "Add new" qui nous redirect vers le formulaire d'ajout

*Pour visulaizer les details necessaire pour un module il suffit de clicker sur "View" et on se redirect vers la page ou on voit tous les details

*La génration automatiques des données , le dysfonctionnement aléatoire d'un module et la tolérance aux pannes des modules sont des scripts dans ce projet :
Pour les tester merci de copier ce code dans le console :
-php artisan module:GenerateData    (pour générer des données aléatoirement pour des modules aléatoire)
-php artisan module:shutdown        (pour dysfonctionner un module aléatoirement)
-php artisan module:tolerance       (pour refonctionner un module en panne)
Pour faire tourner ces scripts en background (chaque 5 minutes) merci d'utiliser cette commande : php artisan schedule:work

*Pour activer la notification on a utilisé le pusher (merci de le configurer en suivant les étapes mentionné dans la documentation https://laravel.com/docs/9.x/broadcasting)
*A chaque fois qu'un module tombe en panne en reçoit une notification contenant le nom du module et qu'il est en panne (et cela fonctionne dans n'import qu'elle view vous êtes en train de visiter)
*Si vous voulez tester la notification il suffit de faire tourner le script du shutdown (aprés avoir configurer le pusher)
