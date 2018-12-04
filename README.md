# Notes APP

Notes APP is a RESTfull API which is allowing users to create, read, update and delete notes

# Requirements

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension  
- JSON PHP Extension
- Composer
- MySQL Server


# Installation

Notes APP is created on Lumen Laravel microframework

Download the repo, install the Lumen and dependencies and start the server.

```sh
$ git clone https://github.com/davithuroyan/notes_app.git
$ cd notes_app
$ composer install
```


### Configuration

Create an environment, generate a key, config your database connections

```sh
$ mv .env.example .env # for windows: copy .env.example .env
$ php -r "echo password_hash(uniqid(), PASSWORD_BCRYPT).\"\n\";"
```
And copy generated key to .env APP_KEY

Then config your database connections in .env file

Run the migration
```sh 
$ php artisan migrate
```

### Launch the application
```sh 
php -S localhost:8000 -t public
```

### How to make requests

#### Authentication
```sh
curl -XGET -H "Content-type: application/json" 'http://localhost:8000/api/login?email=davithuroyan2@gmail.com&password=123456'
```

Copy api_key and use in requests below

#### Create New Note
```sh
curl -XPOST -H 'Authorization: bearer {api_key}' -H "Content-type: application/json" -d '{ "title":"note title", "note":"note content" }' 'http://localhost:8000/api/notes''
```

#### Get Note By Id
```sh
curl -XGET -H 'Authorization: bearer {api_key}' -H "Content-type: application/json" http://localhost:8000/api/notes/{note_id}'
```

#### Get All user Notes
```sh
curl -XGET -H 'Authorization: bearer {api_key}' -H "Content-type: application/json" 'http://localhost:8000/api/notes'
```

#### Update Note
```$sh
curl -XPUT -H 'Authorization: bearer {api_key}' -H "Content-type: application/json" -d '{ "title":"note title", "note":"note content" }' 'http://localhost:8000/api/notes/{note_id}'
```

#### Delete Note
```sh
curl -XDELETE -H 'Authorization: bearer {api_key}' -H "Content-type: application/json" 'http://localhost:8000/api/notes/{note_id}'
```