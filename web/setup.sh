curl -o Dockerfile https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/Dockerfile
curl -o certificate.crt https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/certificate.crt
curl -o private.key https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/private.key

mkdir b2b.wt1-11.ephec-ti.be
mkdir b2b.wt1-11.ephec-ti.be/public_html

curl -o index.html https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/b2b.wt1-11.ephec-ti.be/public_html/index.html
mv index.html b2b.wt1-11.ephec-ti.be/public_html/


mkdir html
curl -o index.html https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/html/index.html
mv index.html html/


mkdir sites-available
curl -o 000-default.conf https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/sites-available/000-default.conf
mv 000-default.conf sites-available/
curl -o b2b.wt1-11.ephec-ti.be.conf https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/sites-available/b2b.wt1-11.ephec-ti.be.conf
mv b2b.wt1-11.ephec-ti.be.conf sites-available/
curl -o default-ssl.conf https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/sites-available/default-ssl.conf
mv default-ssl.conf sites-available/
curl -o wt1-11.ephec-ti.be.conf https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/sites-available/wt1-11.ephec-ti.be.conf
mv wt1-11.ephec-ti.be.conf sites-available/
curl -o www.wt1-11.ephec-ti.be.conf https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/sites-available/www.wt1-11.ephec-ti.be.conf
mv www.wt1-11.ephec-ti.be.conf sites-available/


mkdir sites-enabled
curl -o b2b.wt1-11.ephec-ti.be.conf https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/sites-enabled/b2b.wt1-11.ephec-ti.be.conf
mv b2b.wt1-11.ephec-ti.be.conf sites-enabled/
curl -o wt1-11.ephec-ti.be.conf https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/sites-enabled/wt1-11.ephec-ti.be.conf
mv wt1-11.ephec-ti.be.conf sites-enabled/
curl -o www.wt1-11.ephec-ti.be.conf https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/web/sites-enabled/www.wt1-11.ephec-ti.be.conf
mv www.wt1-11.ephec-ti.be.conf sites-enabled/

