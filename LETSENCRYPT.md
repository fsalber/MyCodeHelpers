# Let's Encrypt

Here is a little README with let's encrypt command

### 1.Installation

Clone let's encrypt repository

```sh
git clone https://github.com/letsencrypt/letsencrypt /opt/letsencrypt --depth=1
```

### 2.Usage

If you want to create certificates, use this :

Apache :
```sh
/opt/letsencrypt/letsencrypt-auto --authenticator standalone --installer apache -d domain1.tld -d domain2.tld --pre-hook "service apache2 stop" --post-hook "service apache2 start"
```

NGINX :
```sh
/opt/letsencrypt/letsencrypt-auto --authenticator standalone --installer nginx -d domain1.tld -d domain2.tld --pre-hook "service nginx stop" --post-hook "service nginx start"
```

If you want to renew certificates, use this :

Apache :
```sh
/opt/letsencrypt/letsencrypt-auto --authenticator standalone --installer apache -d domain1.tld -d domain2.tld --renew-by-default --pre-hook "service apache2 stop" --post-hook "service apache2 start"
```

NGINX :
```sh
/opt/letsencrypt/letsencrypt-auto --authenticator standalone --installer nginx -d domain1.tld -d domain2.tld --renew-by-default --pre-hook "service nginx stop" --post-hook "service nginx start"
```