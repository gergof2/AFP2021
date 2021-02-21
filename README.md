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

|Method| Path | Params| Response |
|------|------|-------|----------|
|GET|/api/login |username/email, password|user: userid: int, username: string, password: string, email: string, registerdate: date, statusid: int|
|GET|/api/messages |from: int,to: int|messages: id: int, userid: int, text: string, files: string, timedate: date|
|POST|/api/register |username: string, password: string, email: string| success: bool|
|POST|/api/statuschange |userid: int, statusid: int|-|
|POST|/api/sendmessage |userid: int, text: string| success: bool|
|POST|/api/sendfile |userid: int, files: string| success: bool|
|PUT|/api/update |messageId: int, text: string| success: bool|
|DELETE|/api/delete |messageId: int| success: bool|