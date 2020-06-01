curl -o Dockerfile https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/dns/Dockerfile
curl -o named.conf  https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/dns/named.conf
curl -o named.conf.local https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/dns/named.conf.local
curl -o named.conf.options https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/dns/named.conf.options

mkdir zones
curl -o 178.51.in-addr.arpa https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/dns/zones/178.51.in-addr.arpa
mv 178.51.in-addr.arpa zones/
curl -o 18.172.in-addr.arpa https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/dns/zones/18.172.in-addr.arpa
mv 18.172.in-addr.arpa zones/
curl -o db.internal https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/dns/zones/db.internal
mv db.internal zones/
curl -o db.wt1-11.ephec-ti.be https://raw.githubusercontent.com/BelgianNicky/Admin-Reseau/master/dns/zones/db.wt1-11.ephec-ti.be
mv db.wt1-11.ephec-ti.be zones/
