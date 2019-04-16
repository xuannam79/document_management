<?php
return [
    'patter_email' => '^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$',
    'patter_fullname' => '^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\\s]{6,}$',
    'patter_address' => '^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ] /@#$%&]+',
    'roles' => [
        'system_admin' => 1,
        'admin_department' => 2,
        'user' => 3,
    ],
    'active' => [
        'is_active' => 1,
        'no_active' => 0,
    ],
    'status' => [
        'no_lock' => 1,
        'lock' => 0,
    ],
    'position' => [
        'admin_department' => 1,
        'sub_admin' => 2,
        'secretary' => 3,
        'instructor' => 4,
    ],
    'department' => [
        'no_department' => 0,
    ],
    'gender' => [
        'male' =>  1,
        'female' => 2,
    ],
    'position' => [
        'no_delegacy' => 1,
        'edit_document' => 2,
    ],
];
