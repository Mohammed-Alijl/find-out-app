<?php


return [
    /*
    |--------------------------------------------------------------------------
    | Failed Messages
    |--------------------------------------------------------------------------
    |
    | The following language lines are the arabic lines which match reasons
    | that in any failed occur in any position in the system
    |
    */

    //===================================================================================
    // ZONES=============================================================================
    //===================================================================================
    'zone.delete.failed' => 'المنطقة قيد الاستخدام',
    'zone.name_ar.required' => 'الرجاء إدخال اسم المنطقة بالعربية',
    'zone.name_ar.max' => 'اسم المنطقة بالعربية طويل جدًا',
    'zone.name_en.required' => 'الرجاء إدخال اسم المنطقة بالإنجليزية',
    'zone.name_en.max' => 'اسم المنطقة بالإنجليزية طويل جدًا',

    //===================================================================================
    // CITES=============================================================================
    //===================================================================================
    'city.delete.failed' => 'المدينة قيد الاستخدام',
    'city.name_ar.required' => 'الرجاء إدخال اسم المدينة بالعربية',
    'city.name_ar.max' => 'اسم المدينة بالعربية طويل جدًا',
    'city.name_en.required' => 'الرجاء إدخال اسم المدينة بالإنجليزية',
    'city.name_en.max' => 'اسم المدينة بالإنجليزية طويل جدًا',
    'city.zone_id.required' => 'الرجاء اختيار منطقة من صندوق الاختيار المخصص للمناطق',
    'city.not_found' => 'المدينة غير موجودة',

    //===================================================================================
    // CATEGORY TYPE=====================================================================
    //===================================================================================
    'category.type.delete.failed' => 'نوع القسم قيد الاستخدام',
    'category.type.name_ar.required' => 'الرجاء إدخال اسم نوع القسم بالعربية',
    'category.type.name_ar.max' => 'اسم نوع القسم بالعربية طويل جدًا',
    'category.type.name_en.required' => 'الرجاء إدخال اسم نوع القسم بالإنجليزية',
    'category.type.name_en.max' => 'اسم نوع القسم بالإنجليزية طويل جدًا',

    //===================================================================================
    // CATEGORY==========================================================================
    //===================================================================================
    'category.delete.failed' => 'القسم قيد الاستخدام',
    'category.parent_category_id.exists' => 'الرجاء اختيار القسم الرئيسي فقط من صندوق الاختيار المخصص للأفسام',
    'category.name_ar.required' => 'الرجاء إدخال اسم القسم بالعربية',
    'category.name_ar.max' => 'اسم القسم بالعربية طويل جدًا',
    'category.name_en.required' => 'الرجاء إدخال اسم القسم بالإنجليزية',
    'category.name_en.max' => 'اسم القسم بالإنجليزية طويل جدًا',
    'category.category_type_id.required' => 'الرجاء اختيار القسم من صندوق الاختيار المخصص للاقسام',


    //===================================================================================
    // CUSTOMER==========================================================================
    //===================================================================================
    'customer.name.required' => 'الرجاء إدخال اسمك.',
    'customer.name.max' => 'الاسم طويل جدًا',
    'customer.email.required' => 'الرجاء إدخال عنوان البريد الإلكتروني الخاص بك.',
    'customer.email.email' => 'الرجاء إدخال عنوان بريد إلكتروني صالح.',
    'customer.email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',
    'customer.mobile_number.required' => 'الرجاء إدخال رقم هاتفك المحمول.',
    'customer.mobile_number.max' => 'الرجاء إدخال رقم هاتف محمول صالح.',
    'customer.mobile_number.unique' => 'هذا الرقم المحمول مستخدم بالفعل.',
    'customer.password.required' => 'الرجاء إدخال كلمة مرور.',
    'customer.password.min' => 'يجب أن تتألف كلمة المرور من 8 أحرف على الأقل.',
    'customer.password.max' => 'كلمة المرور طويلة جدًا',
    'customer.zone_id.required' => 'الرجاء اختيار منطقة صالحة',
    'customer.city_id.required' => 'الرجاء اختيار مدينة صالحة',
    'customer.platform.required' => 'الرجاء اختيار منصة صالحة',
    'customer.platform.in' => 'الرجاء اختيار منصة صالحة',


    //===================================================================================
    // SERVICE===========================================================================
    //===================================================================================
    'service.name.required' => 'الرجاء إدخال اسم الخدمة',
    'service.name.max' => 'اسم الخدمة طويل جداً',
    'service.start_at.date_format' => 'الرجاء إدخال وقت بداية صحيح',
    'service.end_at.date_format' => 'الرجاء إدخال وقت نهاية صحيح',
    'service.facebook_link.regex' => 'رابط الفيسبوك غير صالح',
    'service.instagram_link.regex' => 'رابط الإنستجرام غير صالح',
    'service.twitter_link.regex' => 'رابط تويتر غير صالح',
    'service.category_id.required' => 'الرجاء اختيار الفئة الرئيسية',
    'service.images.required' => 'الرجاء إدخال صورة واحدة على الأقل',
    'service.images.*.image' => 'الرجاء إرسال صور فقط',
    'service.images.*.mimes' => 'يجب أن تكون الصورة من الأنواع: jpg, png, svg, jpeg',
    'service.images.*.max' => 'حجم الصورة كبير جداً',
    'service.zone_id.required' => 'الرجاء اختيار منطقة واحدة على الأقل',
    'service.city_id.required' => 'الرجاء اختيار مدينة واحدة على الأقل',
    'service.city_id.size' => 'يجب إدخال رقم هاتف محمول لجميع المدن',
    'service.mobile_number.required' => 'الرجاء إدخال رقم هاتف محمول واحد على الأقل',
    'service.mobile_number.size' => 'يجب إدخال رقم هاتف محمول لجميع المدن',
    'service.not_found' => 'الخدمة غير موجودة',


    //===================================================================================
    // ADVERTISEMENTS====================================================================
    //===================================================================================
    'advertisement.name_ar.required' => 'الاسم العربي للإعلان مطلوب',
    'advertisement.name_ar.max' => 'الاسم العربي للإعلان طويل جداً',
    'advertisement.name_en.required' => 'الاسم الإنجليزي للإعلان مطلوب',
    'advertisement.name_en.max' => 'الاسم الإنجليزي للإعلان طويل جداً',
    'advertisement.category_type_id.required' => 'الرجاء اختيار نوع الفئة',
    'advertisement.category_type_id.integer' => 'الرجاء اختيار نوع الفئة',
    'advertisement.category_type_id.exists' => 'الرجاء اختيار نوع الفئة',
    'advertisement.service_id.required' => 'الرجاء اختيار الخدمة',
    'advertisement.service_id.integer' => 'الرجاء اختيار الخدمة',
    'advertisement.service_id.exists' => 'الرجاء اختيار الخدمة',
    'advertisement.display_place.required' => 'الرجاء اختيار مكان العرض للإعلان',
    'advertisement.display_place.in' => 'الرجاء اختيار الخدمة',
    'advertisement.city_id.integer' => 'الرجاء اختيار المدينة من صندوق الاختيار المخصص للمدن',
    'advertisement.city_id.exists' => 'الرجاء اختيار المدينة من صندوق الاختيار المخصص للمدن',
    'advertisement.city_id.required_if' => 'عند اختيار مكان العرض في المدينة او في كلا الصفحة الرئيسية و المدينة معا يجب عليك اختيار المدينة',
    'advertisement.not_found' => 'الاعلان غير موجود',

    //===================================================================================
    // PAGES=============================================================================
    //===================================================================================
    'page.name_ar.required' => 'اسم الصفحة بالعربية مطلوب',
    'page.name_ar.max' => 'اسم الصفحة بالعربية طويل جدًا',
    'page.name_en.required' => 'اسم الصفحة بالإنجليزية مطلوب',
    'page.name_en.max' => 'اسم الصفحة بالإنجليزية طويل جدًا',
    'page.content.required' => 'محتوى الصفحة مطلوب',
    'page.image.required' => 'الرجاء إرسال صورة الصفحة',
    'page.image.image' => 'الرجاء إرسال صورة فقط',
    'page.image.mimes' => 'يجب أن تكون صيغة الصورة jpg، png، jpeg أو svg',
    'page.not_found' => 'هذه الصفحة غير موجودة' ,

    //===================================================================================
    // SOCIAL MEDIA======================================================================
    //===================================================================================
    'social.link.url' => 'الرجاء ادخال رابط صالح',
    'social.link.required' => 'الرابط مطلوب',

    //===================================================================================
    // CONTACT REQUEST===================================================================
    //===================================================================================
    'contact.name.required' => 'رجاء قم بادخال اسمك',
    'contact.name.max' => 'الاسم طويل جدا',
    'contact.email.required' => 'رجاء ادخل عنوان البريد الالكتروني الخاص بك',
    'contact.email.email' => 'الرجاء ادخال بريد الكتروني صالح',
    'contact.title.required' => 'رجاء ادخل العنوان',
    'contact.title.max' => 'يجب ان يكون العنوان اقل من 150 حرف',
    'contact.message.required' => 'رجاء ادخل الرسالة',

    'unauthorized' => 'غير مصرح لك بالدخول'

];
