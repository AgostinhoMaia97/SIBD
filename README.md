# SIBD
This project is related with a design of a Networking Forum Website. 
It was developed by Agostinho Maia (up201909553) and David Maia (up201706889).

To run this project:

1- Please install docker and start a container. <br />
2- Execute - sudo git clone https://github.com/AgostinhoMaia97/SIBD.git inside the docker folder. <br />
3- Inside the docker folder, execute - cd SIBD/html/html/site and then give full permissions - sudo chmod 777 -R ./* <br />
4- If you want to run the DataBase file, please first remove the existing one - sudo rm networkforum.db in /sql folder. Then, execute - sudo sqlite3 -init networkforum.sql networkforum.db. <br />
5- Please use Google Chrome browser to use the forum. Mozilla Firefox has some troubles with CSS. <br />

