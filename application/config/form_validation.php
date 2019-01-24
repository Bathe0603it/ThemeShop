<?php
defined('BASEPATH') or exit('No direct script access allowed');
$config = array(
    /** VALIDATE đăng nhập **/
    'admin_login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email',
            'errors' => array(
                'required' => '%s không được để trống.',
                'valid_email' => '%s không đúng định dạng',
                )),

        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[6]|max_length[12]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'max_length' => '%s có số ký tự tối đa là 12')),
    ),

    /** User create **/
    'user_create' => array(
        array(
            'field' => 'username',
            'label' => 'Thông tin tên',
            'rules' => 'trim|required|max_length[100]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn 100',
                )),

        array(
            'field' => 'email',
            'label' => 'Thông tin Email',
            'rules' => 'trim|required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'valid_email'   => '%s nhập đúng định dạng.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'is_unique'     => '%s đã được đăng kí',
                'max_length' => '%s có số ký tự tối đa là 100')),

        array(
            'field' => 'tel',
            'label' => 'Thông tin số điện thoại',
            'rules' => 'trim|min_length[9]|max_length[15]',
            'errors' => array(
                'min_length' => '%s phải có số ký tự tối thiểu là 9',
                'max_length' => '%s có số ký tự tối đa là 15')),

        array(
            'field' => 'address',
            'label' => 'Thông tin địa chỉ',
            'rules' => 'trim|required|min_length[6]|max_length[255]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'max_length' => '%s có số ký tự tối đa là 255')),

        array(
            'field' => 'description',
            'label' => 'Mô tả',
            'rules' => 'trim',
            'errors' => array()),

        array(
            'field' => 'receive',
            'label' => 'Nhận thông tin về email',
            'rules' => 'trim',
            'errors' => array()),

        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[6]|max_length[80]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'max_length' => '%s có số ký tự tối đa là 80')),

        array(
            'field' => 'confirmpassword',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[6]|max_length[80]|matches[password]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'matches'   => '%s không khớp nhau',
                'max_length' => '%s có số ký tự tối đa là 80')),
    ),

    /** User Edit **/
    'user_edit' => array(
        array(
            'field' => 'username',
            'label' => 'Thông tin tên',
            'rules' => 'trim|required|max_length[100]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn 100',
                )),

        array(
            'field' => 'tel',
            'label' => 'Thông tin số điện thoại',
            'rules' => 'trim|min_length[9]|max_length[15]',
            'errors' => array(
                'min_length' => '%s phải có số ký tự tối thiểu là 9',
                'max_length' => '%s có số ký tự tối đa là 15')),

        array(
            'field' => 'address',
            'label' => 'Thông tin địa chỉ',
            'rules' => 'trim|required|min_length[6]|max_length[255]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'max_length' => '%s có số ký tự tối đa là 255')),

        array(
            'field' => 'description',
            'label' => 'Mô tả',
            'rules' => 'trim',
            'errors' => array()),

        array(
            'field' => 'receive',
            'label' => 'Nhận thông tin về email',
            'rules' => 'trim',
            'errors' => array()),

        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[6]|max_length[80]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'max_length' => '%s có số ký tự tối đa là 80')),

        array(
            'field' => 'confirm_password',
            'label' => 'Password không khớp',
            'rules' => 'trim|required|min_length[6]|max_length[80]|matches[password]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'matches'   => '%s password không khớp',
                'max_length' => '%s có số ký tự tối đa là 80')),
    ),

    /** Role create **/
    'role_create' => array(
        array(
            'field' => 'name',
            'label' => 'Nhãn đường dẫn',
            'rules' => 'trim|required|max_length[255]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn 255',
                )),
        array(
            'field' => 'permission',
            'label' => 'Đường dẫn',
            'rules' => 'trim|required|max_length[255]|is_unique[roles.permission]',
            'errors' => array(
                'required'  => '%s không được để trống.',
                'max_length'    => '%s có chiều dài không lớn hơn 255',
                'is_unique' => '%s đã tồn tại',
                )),
    ),

    /** Role edit **/
    'role_edit' => array(
        array(
            'field' => 'name',
            'label' => 'Nhãn đường dẫn',
            'rules' => 'trim|required|max_length[255]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn 255',
                )),
        array(
            'field' => 'permission',
            'label' => 'Đường dẫn',
            'rules' => 'trim|required|max_length[255]|callback_permissionCheck',
            'errors' => array(
                'required'  => '%s không được để trống.',
                'max_length'    => '%s có chiều dài không lớn hơn 255',
                'permissionCheck' => '%s đã tồn tại ở 1 bản ghi',
                )),
    ),

    /** Category **/
    // Create
    'cat_create' => array(
        array(
            'field' => 'name',
            'label' => 'Thông tin tên',
            'rules' => 'trim|required|max_length[255]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn 255 Kí tự',
            )
        ),
        array(
            'field' => 'slug',
            'label' => 'Đường dẫn',
            'rules' => 'trim|is_unique[categorys.slug]',
            'errors' => array(
                'is_unique' => '%s phải là duy nhất (<i>Đã tồn tại đường dẫn này</i>)',
            )
        ),
    ),
    // Edit
    'cat_edit' => array(
        array(
            'field' => 'name',
            'label' => 'Thông tin tên',
            'rules' => 'trim|required|max_length[255]',
            'errors' => array(
                'required' => '{feild} không được để trống.',
                'max_length' => '{feild} có chiều dài không lớn hơn {param} Kí tự',
            )
        ),
        array(
            'field' => 'slug',
            'label' => 'Đường dẫn',
            'rules' => 'trim|required|callback_slugCheck',
            'errors' => array(
                'required' => '{feild} vui lòng không để trống.'
                'slugCheck' => '{feild} đã tồn tại ở 1 bản ghi khác vui lòng đặt lại',
            )
        ),
    ),

    /** Product create **/
    'product_create' => array(
        array(
            'field' => 'name',
            'label' => 'Tên sản phẩm',
            'rules' => 'trim|required|max_length[320]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn {param}',
            )
        )
    ),

    'product_edit' => array(
        array(
            'field' => 'name',
            'label' => 'Tên sản phẩm',
            'rules' => 'trim|required|max_length[320]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn {param}',
            )
        ),

        array(
            'field' => '',
            'label' => 'Tên sản phẩm',
            'rules' => 'trim|required|max_length[320]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn {param}',
            )
        ),
    ),
);
