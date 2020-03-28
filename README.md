wjiec / bops-example
--------------------

wjiec/bops example


#### Quick start

Clone this repo
```bash
git clone https://github.com/wjiec/php-bops-example.git
```

composer initialize
```bash
cd php-bops-example
composer install
```

setup web server(nginx example)
```bash
server {
    listen 80;
    server_name default;

    root /path/to/php-bops-example; # change me
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?_url=$uri&$args;
    }

    location ~ \.php$ {
        try_files $uri =404;

        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        include fastcgi_params;

        fastcgi_split_path_info ^(.+?\.php)(/.*)$;
        if (!-f $document_root$fastcgi_script_name) {
            return 404;
        }

        fastcgi_param PATH_INFO $fastcgi_path_info;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

and open browser to type url
```bash
http://127.0.0.1/
```

boom~
