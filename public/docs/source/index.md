---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---

# Info

Welcome to the generated API reference.
[Get Postman Collection](public/docs/collection.json)

# Available routes
#general
## API Login, on success return JWT Auth token

> Example request:

```bash
curl "http://localhost//session" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//session",
    "method": "POST",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST /session`


## Returns the authenticated user

> Example request:

```bash
curl "http://localhost//session" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//session",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /session`

`HEAD /session`


## Refresh the token

> Example request:

```bash
curl "http://localhost//session" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//session",
    "method": "PUT",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PUT /session`


## Log out
Invalidate the token, so user cannot use it anymore
They have to relogin to get a new token

> Example request:

```bash
curl "http://localhost//session" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//session",
    "method": "DELETE",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`DELETE /session`


## /users

> Example request:

```bash
curl "http://localhost//users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//users",
    "method": "POST",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST /users`


