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
`METHOD: GET
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
}`
#### `/api/workers`
`METHOD: POST
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
}`
#### `/api/workers/{id}`
`METHOD: GET
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
}`
#### `/api/workers/{id}`
`METHOD: PUT
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
}`
#### `/api/workers/{id}`
`METHOD: DELETE
RESPONSE: {
    "message": ""
}`
#### `/api/customers`
`METHOD: GET
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
}`
#### `/api/customers`
`METHOD: POST
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
}`
#### `/api/customers/{id}`
`METHOD: GET
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
}`
#### `/api/customers/{id}`
`METHOD: PUT
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
}`
#### `/api/customers/{id}`
`METHOD: DELETE
RESPONSE: {
    "message": ""
}`
#### `/api/tasks`
`METHOD: GET
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
}`
#### `/api/tasks`
`METHOD: POST
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
}`
#### `/api/tasks/{id}`
`METHOD: GET
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
}`
#### `/api/tasks/{id}`
`METHOD: PUT
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
}`
#### `/api/tasks/{id}`
`METHOD: DELETE
RESPONSE: {
    "message": ""
}`
