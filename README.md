# MySQL-relay

There is no need in detailed documentation. This is just a set of examples
for implementation of JavaScript-to-MySQL relay.

`/include` directory consists of two files. `auth.php` and `db.php`. These are
the core files, used in examples as libraries. Auth file helps with
authorise process. DB file has a PDO singletone and `request()` method
to use it.

`/config` folder contains default config file that used in examples as settings
storage.

`/examples` directory includes three examples. Two of them are JavaScript-based
frontend/backend implementation of relay (for posting requests as FormData
and in plain JSON format). And the last one - is general purpose version,
that work without JavaScript.
