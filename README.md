# dilemma-web

Treba je glasvat tastar


## Documentation

#### Ruby version

2.3.0

#### System dependencies

#### Configuration

```
bundle install
```

#### Database creation

Login in terminal:
```
psql -d postgres
```

Create db in psql:
```
create user dilemma password 'dilemma';
alter user dilemma CREATEDB;
create database dilemma_development owner dilemma;
create database dilemma_test owner dilemma;
GRANT ALL PRIVILEGES ON DATABASE dilemma_development, dilemma_test TO dilemma;
```


#### Database initialization

```
rake:db migrate
rake:db seed
```

#### Start the server

```
rails s
```

#### How to run the test suite

#### Services (job queues, cache servers, search engines, etc.)

#### Deployment instructions

