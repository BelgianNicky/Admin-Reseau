# Avoir mail et web ensemble

Etant donné que notre mail utilise une interface web, il doit donc avoir accès au serveur apache. Si vous vouelz avoir et un serveur mail avec interface web, et un serveur apache, utilisez cette installation.


## 1) Créer l'image web
Rendez vous ici https://github.com/BelgianNicky/Admin-Reseau/tree/master/web et créer l'image web.

## 2) télécharger le script récupérant l'ensemble des éléments nécessaires
```
curl -o setup.sh https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/mailandweb/setup.sh
```

## 3) Exécuter le script
```
bash setup.sh
```

## 4) Modifier les éléments afin d'adapter la configuration à vos besoins (les certificats et pages index.html)

## 5) Créer votre image
```
sudo docker build -t mailandweb:latest .
```

## 6) Lancer un container basé sur l'image, vous rentrerez dans le container une fois celui-ci créé.
```
sudo docker run -i -t -d -p 25:25 -p 80:80 -p 443:443 -p 587:587 -p 2525:2525 -p 465:465 -p 25025:25025 -p 11334:11334 mail:latest /bin/bash
```

## 7) Lorsque vous êtes dans le container, utilisez le script init.sh
```
bash init.sh
```

## 8) Tappez "exit" pour quitter le container. L'installation est finie.
