Steps to Run.
1. Take a clone inside xampp/htdocs folder
2. Start apache server and mysql
2. After Clone Run following command to create required tables along with data in it
  php artisan migrate:fresh --seed
  php artisan serve 

3. open postman app  and import the following collection after unzipping and make an api call to see the output

[CoachTimeSlot.postman_collection.zip](https://github.com/mpratik95/Coaches/files/9608018/CoachTimeSlot.postman_collection.zip)
