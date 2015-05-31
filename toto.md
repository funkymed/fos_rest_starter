## /api/v1/entities ##

### `GET` /api/v1/entities.{_format} ###

_Return all entities_

Return all entities

#### Requirements ####

**_format**

  - Requirement: xml|json|html


## /api/v1/entities/{id} ##

### `GET` /api/v1/entities/{id}.{_format} ###

_Return an entity by id_

Return an entity by id

#### Requirements ####

**_format**

  - Requirement: xml|json|html
**id**



## /api/v1/params ##

### `POST` /api/v1/params.{_format} ###

_Return all data_

Return all data

#### Requirements ####

**_format**

  - Requirement: xml|json|html

#### Parameters ####

page:

  * type: 
  * required: false
  * description: Page

limit:

  * type: 
  * required: false
  * description: Nb result

orderby:

  * type: 
  * required: false
  * description: Ordre ASC|DESC


## /api/v1/params/{id} ##

### `PUT` /api/v1/params/{id}.{_format} ###

_update_

#### Requirements ####

**_format**

  - Requirement: xml|json|html
**id**



### `DELETE` /api/v1/params/{id}.{_format} ###

_delete_

#### Requirements ####

**_format**

  - Requirement: xml|json|html
**id**



## /api/v1/test ##

### `GET` /api/v1/test.{_format} ###

_Return true_

Return true

#### Requirements ####

**_format**

  - Requirement: xml|json|html
