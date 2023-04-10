create table users(
  username varchar(255) REFERENCES services(username)
  ,password varchar(255)
  ,email varchar(255)
)
  
 
  
  
