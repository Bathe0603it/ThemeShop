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

    'user_create' => array(
        array(
            'field' => 'FullName',
            'label' => 'Thông tin tên',
            'rules' => 'trim|required|max_length[100]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn 100',
                )),

        array(
            'field' => 'Email',
            'label' => 'Thông tin Email',
            'rules' => 'trim|required|min_length[6]|max_length[100]|valid_email|is_unique[user.email]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'valid_email'   => '%s nhập đúng định dạng.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'is_unique'     => '%s đã được đăng kí',
                'max_length' => '%s có số ký tự tối đa là 100')),

        array(
            'field' => 'Tel',
            'label' => 'Thông tin số điện thoại',
            'rules' => 'trim|min_length[9]|max_length[15]',
            'errors' => array(
                'min_length' => '%s phải có số ký tự tối thiểu là 9',
                'max_length' => '%s có số ký tự tối đa là 15')),

        array(
            'field' => 'Address',
            'label' => 'Thông tin địa chỉ',
            'rules' => 'trim|required|min_length[6]|max_length[255]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'max_length' => '%s có số ký tự tối đa là 255')),

        array(
            'field' => 'Description',
            'label' => 'Mô tả',
            'rules' => 'trim',
            'errors' => array()),

        array(
            'field' => 'Receive',
            'label' => 'Nhận thông tin về email',
            'rules' => 'trim',
            'errors' => array()),

        array(
            'field' => 'Password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[6]|max_length[80]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'max_length' => '%s có số ký tự tối đa là 80')),

        array(
            'field' => 'ConfirmPassword',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[6]|max_length[80]|matches[Password]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'matches'   => '%s không khớp nhau',
                'max_length' => '%s có số ký tự tối đa là 80')),

    ),

    'user_edit' => array(
        array(
            'field' => 'FullName',
            'label' => 'Thông tin tên',
            'rules' => 'trim|required|max_length[100]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn 100',
                )),

        array(
            'field' => 'Tel',
            'label' => 'Thông tin số điện thoại',
            'rules' => 'trim|min_length[9]|max_length[15]',
            'errors' => array(
                'min_length' => '%s phải có số ký tự tối thiểu là 9',
                'max_length' => '%s có số ký tự tối đa là 15')),

        array(
            'field' => 'Address',
            'label' => 'Thông tin địa chỉ',
            'rules' => 'trim|required|min_length[6]|max_length[255]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'max_length' => '%s có số ký tự tối đa là 255')),

        array(
            'field' => 'Description',
            'label' => 'Mô tả',
            'rules' => 'trim',
            'errors' => array()),

        array(
            'field' => 'Receive',
            'label' => 'Nhận thông tin về email',
            'rules' => 'trim',
            'errors' => array()),

        array(
            'field' => 'Password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[6]|max_length[80]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'max_length' => '%s có số ký tự tối đa là 80')),

        array(
            'field' => 'ConfirmPassword',
            'label' => 'Password không khớp',
            'rules' => 'trim|required|min_length[6]|max_length[80]|matches[password]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'min_length' => '%s phải có số ký tự tối thiểu là 6',
                'matches'   => '%s password không khớp',
                'max_length' => '%s có số ký tự tối đa là 80')),

    ),

    'role_create' => array(
        array(
            'field' => 'Name',
            'label' => 'Nhãn đường dẫn',
            'rules' => 'trim|required|max_length[255]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn 255',
                )),
        array(
            'field' => 'Permission',
            'label' => 'Đường dẫn',
            'rules' => 'trim|required|max_length[255]|is_unique[role.permission]',
            'errors' => array(
                'required' => '%s không được để trống.',
                'max_length' => '%s có chiều dài không lớn hơn 255',
                )),
    ),

    
);
