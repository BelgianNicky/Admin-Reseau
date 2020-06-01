# Installer le côté web.

## 1) télécharger le script récupérant l'ensemble des éléments nécessaires
```
curl -o setup.sh https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/setup.sh
```

## 2) Exécuter le script
```
bash setup.sh
```

## 3) Modifier les éléments afin d'adapter la configuration à vos besoins (les certificats et pages index.html)

## 4) Créer votre image
```
sudo docker build -t web:latest .
```

## 5) Lancer un container basé sur l'image, vous rentrerez dans le container une fois celui-ci créé.
```
sudo docker run -i -t -d -p 80:80 -p 443:443 web:latest /bin/bash
```

## 6) Lorsque vous êtes dans le container, relancer apache2
```
service apache2 restart
```

## 7) Tappez "exit" pour quitter le container. L'installation est finie.
