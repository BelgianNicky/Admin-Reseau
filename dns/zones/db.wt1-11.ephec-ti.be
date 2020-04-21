$TTL 3600
$ORIGIN wt1-11.ephec-ti.be.
@               IN      SOA     ns.wt1-8.ephec-ti.be. admin.wt1-8.ephec-ti.be. (
                1       ; serial
                3600    ; refresh
                6       ; retry
                604800  ; expire
                3600    ; minimum
)

;Name Server
wt1-11.ephec-ti.be.     IN      NS      ns.wt1-11.ephec-ti.be.

;Mail Server
@                       IN      MX      10 mail

;A records
ns                      IN      A               51.178.41.57
www                     IN      A               51.178.41.57
@                       IN      A               51.178.41.57
mail			IN	A		51.178.41.57

;CNAME records
smtp IN CNAME mail
pop3 IN CNAME mail
imap IN CNAME mail
