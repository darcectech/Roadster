# Roadster
A basic MVC library with SQLite database wrapper. This library is not intended to be used for big commercial products without modification! It is simply here to give developers a basic structure to work with, without having to write boilerplate code.

NOTE:
1.  Avoid using the SQLite database without properly setting the correct file permissions
2.  Avoid using the SQLite database to store valuable data in an unencrypted form.
3.  The ```.htaccess``` file needs to be placed in order for the routing to work properly. Also this is only for web servers running the Apache Web Server software
4.  In its current state, the ```index.php``` file will automatically load the classes and controllers.


###Usage
To create routes, define your route in the ```Routes.php``` file. For example; to accept ```https://<mysite.com>/about-me```, do:
    
    Route::set('about-me',function(){
        // loads view aboutMe.php with sessions enabled
        Controller::createView('aboutMe',true);
    });
    
and the content of ```aboutMe.php``` (which should be in the ```views``` folder) will be loaded.
    
###Structure
The structure for this basic MVC library is as follows:
1.  views/ui go into the views folder
2.  controllers go into controllers folder
3.  classes and other libs go into the classes folder

###Database
To create connection to a SQLite3 database file:
   
    $mydb = new Database('myDatabaseName');
    
To query:

    $mydb->runQuery('SELECT * FROM users');
    
To execute:

    $mydb->run('INSERT INTO users (name,age) VALUES ("bob",32)');
    
To work with rows one by one:

    $mydb->each('SELECT * FROM users',function($user){
         echo $user['name'];
    });
    
When done with the database:

    $mydb->finish();