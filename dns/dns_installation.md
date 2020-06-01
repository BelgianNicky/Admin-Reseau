# Installer le dns

## 1) télécharger le script récupérant l'ensemble des éléments nécessaires
```
curl -o setup.sh https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/dns/setup.sh
```

## 2) Exécuter le script
```
bash setup.sh
```

## 3) Modifier les éléments afin d'adapter la configuration à vos besoins (les fichiers .conf et zones)

## 4) Créer votre image
```
sudo docker build -t dns:latest .
```

## 5) Lancer un container basé sur l'image, vous rentrerez dans le container une fois celui-ci créé.
```
sudo docker run -i -t -d -p 53:53 dns:latest /bin/bash
```

## 6) Lorsque vous êtes dans le container, relancer apache2
```
service bind9 restart
```

## 7) Tappez "exit" pour quitter le container. L'installation est finie.
