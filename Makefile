server-start:
	php -S 127.0.0.1:8000 -t simple-server/public

curl:
	php src/curl.php

guzzle:
	php src/guzzle.php

guzzle-exceptions:
	php src/guzzle-exceptions.php
