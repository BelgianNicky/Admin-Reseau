# Installer le mail

## 1) télécharger le script récupérant l'ensemble des éléments nécessaires
```
curl -o setup.sh https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/mail/setup.sh
```

## 2) Exécuter le script
```
bash setup.sh
```

## 3) Modifier les éléments afin d'adapter la configuration à vos besoins (fichier host, hostname, mailname, config.php)

## 4) Créer votre image
```
sudo docker build -t mail:latest .
```

## 5) Lancer un container basé sur l'image, vous rentrerez dans le container une fois celui-ci créé.
```
sudo docker run -i -t -d -p 25:25 -p 80:80 -p 587:587 -p 2525:2525 -p 465:465 -p 25025:25025 -p 11334:11334 mail:latest /bin/bash
```

## 6) Lorsque vous êtes dans le container, utilisez le script init.sh afin de relancer les services
```
bash init.sh
```

## 7) Pour créer de nouveaux utilisateurs, utilisez cette suite de commande, en rempla!ant "myusername" par le nom d'utilisateur
```
useradd myusername
passwd myusername
mkdir -p /var/www/html/myusername
usermod -m -d /var/www/html/myusername myusername
chown -R myusername:myusername /var/www/html/myusername
```

## 8) Tappez "exit" pour quitter le container. L'installation est finie.
