# AFP2021
## Database
- User
  - userid(primary key)
  - username(unique)
  - password
  - email(unique)
  - registerdate
  - statusid
- UserLogin
  - id(primary key)
  - userid(foreign key)
  - timedate
  - ipaddress
  - platform
- Messages
  - id(primary key)
  - userid(foreign key)
  - text
  - files
  - timedate
## Requests
- GET /api/login
  - params:
    - username/email
    - password
  - response: {user: {userid, username, password, email, registerdate, statusid}}
- GET /api/MESSAGES
  - params:
    - from
    - to
  - response: {messages: {id, userid, text, files, timedate}}
  - Example: from: 1(Newest Message/File), to: 5
- POST /api//REGISTER
  - params
    - username
    - email
    - password
  - response: {true/false}
- POST /api//STATUSCHANGE
  - params:
    - userid
    - statusid
  - response: {}
- POST /api//SENDMESSAGE
  - params:
    - userid
    - text
  - response: {true/false}
- POST /api//SENDFILE
  - params:
    - userid
    - files
  - response: {true/false}
