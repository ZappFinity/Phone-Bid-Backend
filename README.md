Clone this repositry using 'git clone' command\n
open project in vscode
change file name '.env.example' to '.env'
start xampp server and open php my admin
return to vscode and open terminal using 'ctrl + j'
run 'composer update'
run 'php artisan migrate' it will ask you to create new database named 'phonebid' type 'yes' the press enter
run 'php artisan serve'


url for backend will be
http://127.0.0.1:8000/api/login
http://127.0.0.1:8000/api/register
http://127.0.0.1:8000/api/logout [you have to pass bearer token in header you will get when you logged in]
http://127.0.0.1:8000/api/user [must pass token in header]
