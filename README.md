# Projekt

A rendszer munkásokat (worker), feladatokat (task), és ügyfeleket (costumer) kezel. Ezeknél az
elemeknél CRUD műveletek vannak biztosítva.

## Telepítés

1. Klónozd le a projektet.
2. Telepítsd a szükséges függőségeket: `npm install`
3. Hozd létre az adatbázist: `php artisan migrate`
4. Indítsd el az alkalmazást: `php artisan serve`
5. 
### API Végpontok

#### `/api/workers`

```json
METHOD: GET
RESPONSE:{
    "workers": [
        {
            "id": null,
            "first_name": "",
            "last_name": "",
            "email": "",
            "gps_coordinate": "",
            "deleted_at": null,
            "created_at": "",
            "updated_at": ""
        }
    ]
}
```
#### `/api/workers`
```json
METHOD: POST
REQUEST: {
    "first_name": "",
    "last_name": "",
    "email": "",
    "gps_coordinate": ""
}
RESPONSE: {
    "message": "",
    "worker": {
        "first_name": "",
        "last_name": "",
        "email": "",
        "gps_coordinate": "",
        "updated_at": "",
        "created_at": "",
        "id": null
    }
}
```
#### `/api/workers/{id}`
```json
METHOD: GET
RESPONSE: {
    "worker": {
        "id": null,
        "first_name": "",
        "last_name": "",
        "email": "",
        "gps_coordinate": "",
        "deleted_at": null,
        "created_at": "",
        "updated_at": ""
    }
}
```
#### `/api/workers/{id}`
```json
METHOD: PUT
REQUEST: {
    "first_name": "",
    "last_name": "",
    "email": "",
    "gps_coordinate": ""
}
RESPONSE: {
    "message": "",
    "worker": {
        "id": null,
        "first_name": "",
        "last_name": "",
        "email": "",
        "gps_coordinate": "",
        "deleted_at": null,
        "created_at": "",
        "updated_at": ""
    }
}
```
#### `/api/workers/{id}`
```json
METHOD: DELETE
RESPONSE: {
    "message": ""
}
```
#### `/api/customers`
```json
METHOD: GET
RESPONSE:{
    "customers": [
        {
            "id": null,
            "full_name": "",
            "phone": "",
            "email": "",
            "gps_coordinate": "",
            "deleted_at": null,
            "created_at": "",
            "updated_at": ""
        }
    ]
}
```
#### `/api/customers`
```json
METHOD: POST
REQUEST: {
    "full_name": "",
    "phone": "",
    "email": "",
    "gps_coordinate": ""
}
RESPONSE: {
    "message": "",
    "customer": {
        "full_name": "",
        "phone": "",
        "email": "",
        "gps_coordinate": "",
        "updated_at": "",
        "created_at": "",
        "id": null
    }
}
```
#### `/api/customers/{id}`
```json
METHOD: GET
RESPONSE: {
    "customer": {
        "id": null,
        "full_name": "",
        "phone": "",
        "email": "",
        "gps_coordinate": "",
        "deleted_at": null,
        "created_at": "",
        "updated_at": ""
    }
}
```
#### `/api/customers/{id}`
```json
METHOD: PUT
REQUEST: {
    "full_name": "",
    "phone": "",
    "email": "",
    "gps_coordinate": ""
}
RESPONSE: {
    "message": "",
    "customer": {
        "id": null,
        "full_name": "",
        "phone": "",
        "email": "",
        "gps_coordinate": "",
        "deleted_at": null,
        "created_at": "",
        "updated_at": ""
    }
}
```
#### `/api/customers/{id}`
```json
METHOD: DELETE
RESPONSE: {
    "message": ""
}
```
#### `/api/tasks`
```json
METHOD: GET
RESPONSE:{
    "tasks": [
        {
            "id": null,
            "customer_id": null,
            "description": "",
            "type": "",
            "status": "",
            "gps_location": null,
            "deleted_at": null,
            "created_at": "",
            "updated_at": "",
            "customer": {
                "id": null,
                "full_name": "",
                "phone": "",
                "email": "",
                "gps_coordinate": "",
                "deleted_at": null,
                "created_at": "",
                "updated_at": ""
            },
            "workers": []
        }
    ]
}
```
#### `/api/tasks`
```json
METHOD: POST
REQUEST: {
    "customer_id": null,
    "description": "",
    "type": "",
    "status": "",
    "workers": []
}
RESPONSE: {
    "message": "",
    "task": {
        "description": "",
        "type": "",
        "status": "",
        "gps_location": "",
        "customer_id": null,
        "updated_at": "",
        "created_at": "",
        "id": null
    }
}
```
#### `/api/tasks/{id}`
```json
METHOD: GET
RESPONSE: {
    "task": [
        {
            "id": null,
            "customer_id": null,
            "description": "",
            "type": "",
            "status": "",
            "gps_location": null,
            "deleted_at": null,
            "created_at": "",
            "updated_at": "",
            "customer": {
                "id": null,
                "full_name": "",
                "phone": "",
                "email": "",
                "gps_coordinate": "",
                "deleted_at": null,
                "created_at": "",
                "updated_at": ""
            },
            "workers": []
        }
    ]
}
```
#### `/api/tasks/{id}`
```json
METHOD: PUT
REQUEST:{
    "customer_id": null,
    "description": "",
    "type": "",
    "status": "",
    "gps_location": "",
    "workers": []
}
RESPONSE: {
    "message": "",
    "task": {
        "description": "",
        "type": "",
        "status": "",
        "gps_location": "",
        "customer_id": null,
        "updated_at": "",
        "created_at": "",
        "id": null
    }
}
```
#### `/api/tasks/{id}`
```json
METHOD: DELETE
RESPONSE: {
    "message": ""
}
```
