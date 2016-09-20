<?php

//carbon for timedate

//http://laravel-recipes.com/

//faker for dummy data

//Hey alex, just here to say that if you group the label and input within a div with class "form-group" it handles with margins and stuff, no need to create a class to fix spacing :)﻿

//amazon ses for mail sending

//swiftmail for secure mailing of php

//https://support.google.com/accounts/answer/6010255?hl=en  this link for gmail settings setup

//In case if someone names the foreign key and local key are not in laravel convention( like me lol). you can add it on the model.
//return $this->hasMany('App\Post', 'foreign_key', 'local_key');
//return $this->belongsTo('App\Category', 'foreign_key',local_key);﻿

/* If you get "Trying to get property of non-object" you'll need to manually define the column in your post model like this:

public function category()
    {
     return $this->belongsTo('SCM\Category', 'category_id');
    } */

//One important thing is, you have to maintain the foreign key convention. For example if the table name is myTable , you have to use myTable_id in the linking table as foreign key. In this case if you put anything else other than category_id as column name it will not work, unless you  overwrite the convention.﻿