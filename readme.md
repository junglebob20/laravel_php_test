Clone your project
Go to the folder application using cd command on your cmd or terminal
Run <p style="background:#e9e9e9;">composer install</p> on your cmd or terminal
Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration. 
By default, the username is root and you can leave the password field empty. (This is for Xampp) 
By default, the username is root and password is also root. (This is for Lamp)
Run <p style="background:#e9e9e9;">php artisan key:generate</p>
Run <p style="background:#e9e9e9;">php artisan migrate</p>
Run <p style="background:#e9e9e9;">php artisan serve</p>
Go to <a href="localhost:8000">localhost:8000</a>