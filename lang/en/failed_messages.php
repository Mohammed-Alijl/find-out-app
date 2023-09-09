<?php


return [
    /*
    |--------------------------------------------------------------------------
    | Failed Messages
    |--------------------------------------------------------------------------
    |
    | The following language lines are the english lines which match reasons
    | that in any failed occur in any position in the system
    |
    */

    //===================================================================================
    // ZONES=============================================================================
    //===================================================================================
    'zone.delete.failed'=>'The Zone Is In Use',
    'zone.name_ar.required'=>'Please Enter The Arabic Zone Name',
    'zone.name_ar.max'=>'The Arabic Zone Name Is Too Long',
    'zone.name_en.required'=>'Please Enter The English Zone Name',
    'zone.name_en.max'=>'The English Zone Name Is Too Long',

    //===================================================================================
    // CITES=============================================================================
    //===================================================================================
    'city.delete.failed'=>'The City Is In Use',
    'city.name_ar.required'=>'Please Enter The Arabic City Name',
    'city.name_ar.max'=>'The Arabic City Name Is Too Long',
    'city.name_en.required'=>'Please Enter The English City Name',
    'city.name_en.max'=>'The English City Name Is Too Long',
    'city.zone_id.required'=>'Please Select A Zone From Zone Selected Box',

    //===================================================================================
    // CATEGORY TYPE=====================================================================
    //===================================================================================
    'category.type.delete.failed'=>'The Category Type Is In Use',
    'category.type.name_ar.required'=>'Please Enter The Arabic Category Type Name',
    'category.type.name_ar.max'=>'The Arabic Category Type Name Is Too Long',
    'category.type.name_en.required'=>'Please Enter The English Category Type Name',
    'category.type.name_en.max'=>'The English Category Type Name Is Too Long',

    //===================================================================================
    // CATEGORY==========================================================================
    //===================================================================================
    'category.delete.failed'=>'The Category Is In Use',
    'category.parent_category_id.exists'=>'Please Select Parent Category Just From The Selected Box',
    'category.name_ar.required'=>'Please Enter The Arabic Category Name',
    'category.name_ar.max'=>'The Arabic Category Name Is Too Long',
    'category.name_en.required'=>'Please Enter The English Category Name',
    'category.name_en.max'=>'The English Category Name Is Too Long',
    'category.category_type_id.required'=>'Please Select A Category From Category Selected Box',

    //===================================================================================
    // CUSTOMER==========================================================================
    //===================================================================================
    'customer.name.required' => 'Please enter your name.',
    'customer.name.max' => 'Name Is Too Long',
    'customer.email.required' => 'Please enter your email address.',
    'customer.email.email' => 'Please enter a valid email address.',
    'customer.email.unique' => 'This email address is already in use.',
    'customer.mobile_number.required' => 'Please enter your mobile number.',
    'customer.mobile_number.max' => 'Please enter a valid mobile number.',
    'customer.mobile_number.unique' => 'This mobile number is already in use.',
    'customer.password.required' => 'Please enter a password.',
    'customer.password.min' => 'Password should be at least 8 characters long.',
    'customer.password.max' => 'The Password Is Too Long',
    'customer.zone_id.required' => 'Please Select A Valid Zone',
    'customer.city_id.required' => 'Please Select A Valid City',
    'customer.platform.required' => 'Please Select The Platform',
    'customer.platform.in' => 'Please Select The Platform',


    //===================================================================================
    // SERVICE===========================================================================
    //===================================================================================
    'service.name.required' => 'Please Enter The Name Of Service',
    'service.name.max' => 'The Name Of Service Is Too Long',
    'service.start_at.date_format' => 'Please Enter A Valid Start Time',
    'service.end_at.date_format' => 'Please Enter A Valid End Time',
    'service.facebook_link.regex' => 'The Facebook Link Is Invalid',
    'service.instagram_link.regex' => 'The Instagram Link Is Invalid',
    'service.twitter_link.regex' => 'The Twitter Link Is Invalid',
    'service.category_id.required' => 'Please Select The Parent Category',
    'service.images.required' => 'Please Enter At Least One Image',
    'service.images.*.image' => 'Please Send Just Images',
    'service.images.*.mimes' => 'The Image Should be: jpg, png, svg, jpeg',
    'service.images.*.max' => 'The Image Size Is Too Big',
    'service.zone_id.required' => 'Please Select One Zone At Least',
    'service.city_id.required' => 'Please Select One City At Least',
    'service.city_id.size' => 'You Should Enter A Mobile Number For All City',
    'service.mobile_number.required' => 'Please Enter One Mobile Number At Least',
    'service.mobile_number.size' => 'You Should Enter A Mobile Number For All City',
];
