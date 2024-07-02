<?php

return [
    'menu' => [
        'home' => 'Home',
        'category' => [
            'category' => 'Category',
            'index' => 'Categories',
            'create' => 'Create Category',
            'edit' => 'Edit Category',
        ],
        'product' => [
            'product' => 'Product',
            'index' => 'Products',
            'create' => 'Create Product',
            'edit' => 'Edit Product',
        ],
        'table' => [
            'table' => 'Table',
            'index' => 'Tables',
            'create' => 'Create Table',
            'edit' => 'Edit Table',
            'show' => 'Table Show',
        ],
        'report' => [
            'report' => 'Report',
            'index' => 'Reports',
        ],
        'company' => [
            'company' => 'Company',
            'edit' => 'Edit Company',
        ],
        'user' => [
            'user' => 'User',
            'index' => 'Users',
            'create' => 'Create User',
            'edit' => 'Edit User',
        ],
        'logout' => 'Logout',
        'login' => 'Login',
        'register' => 'Register',
    ],
    'messages' => [
        'errors' => [
            'credentials' => 'The provided credentials do not match our records.',
        ],
        'success' => [
            'category' => [
                'created' => 'Category created successfully.',
                'updated' => 'Category updated successfully.',
                'deleted' => 'Category deleted successfully.',
            ],
            'product' => [
                'created' => 'Product created successfully.',
                'updated' => 'Product updated successfully.',
                'deleted' => 'Product deleted successfully.',
            ],
            'table' => [
                'created' => 'Table created successfully.',
                'updated' => 'Table updated successfully.',
                'deleted' => 'Table deleted successfully.',
            ],
            'cart' => [
                'created' => 'Cart created successfully.',
                'updated' => 'Cart updated successfully.',
                'deleted' => 'Cart deleted successfully.',
            ],
            'collection' => [
                'created' => 'Collection created successfully.',
            ],
            'company' => [
                'updated' => 'Company updated successfully.',
            ],
            'user' => [
                'created' => 'User created successfully.',
                'updated' => 'User updated successfully.',
            ],
            'logout' => 'Logout successfully.',
            'login' => 'Login successfully.',
            'register' => 'Register successfully.',
        ],
        'error' => [
            'validations' => [
                'general_error' => 'An error occurred while validating the form.',
                'high_amount' => 'The amount you entered is higher than the total price.',
                'product_quantity_greater_than_cart' => 'The quantity you entered is greater than the cart quantity.',
                'default_max_company_user' => 'You have reached the :limit user limit of your company.',
            ],
            'general_error' => 'An error occurred.',
            'not_allowed_access' => 'You are not allowed to access this page.',
        ],
    ],
    'content' => [
        'category_details' => 'Category Details',
        'product_details' => 'Product Details',
        'table_details' => 'Table Details',
        'company_details' => 'Company Details',
        'manual_collection' => 'Manuel Collection',
        'product_collection' => 'Product Collection',
        'user_details' => 'User Details',
        'has_no_product' => 'There is no product.',
        'analysis' => [
            'open_tables_amount' => 'Open Tables Amount',
            'total_sales_amount' => 'Total Sales Amount',
            'last_month_sales_amount' => 'Last Month Sales Amount',
            'last_day_sales_amount' => 'Last Day Sales Amount',
            'month_based_sales_amount' => 'Month Based Sales Amount',
            'filter_based_sales_amount' => 'Filter Based Sales Amount',
            'has_no_filter' => 'There is no filter.',
        ],
        'home' => [
            'there_is_no_have_table' => 'There is no have table.',
        ],
        'are_u_have_not_a_account' => 'Are you have not a account?',
        'are_u_already_have_a_account' => 'Are you already have a account?',
    ],
    'fields' => [
        'category' => [
            'name' => 'Category Name',
        ],
        'product' => [
            'name' => 'Product Name',
            'price' => 'Price',
            'category' => 'Category',
        ],
        'table' => [
            'name' => 'Table Name',
        ],
        'cart' => [
            'quantity' => 'Quantity',
        ],
        'collection' => [
            'amount' => 'Amount',
            'method' => 'Method',
            'type' => 'Type',
            'methods' => [
                'cash' => 'Cash',
                'credit_card' => 'Credit Card',
            ],
            'total_amount' => 'Total Amount',
            'paid_amount' => 'Paid Amount',
            'remaining_amount' => 'Remaining Amount',
        ],
        'report' => [
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ],
        'company' => [
            'name' => 'Company Name',
            'address' => 'Company Address',
            'phone' => 'Company Phone',
            'email' => 'Company Email',
        ],
        'user' => [
            'name' => 'User Name',
            'email' => 'User Email',
            'password' => 'User Password',
            'password_confirmation' => 'User Password Confirmation',
        ],
    ],
    'buttons' => [
        'create' => 'Create',
        'update' => 'Update',
        'delete' => 'Delete',
        'cancel' => 'Cancel',
        'edit' => 'Edit',
        'actions' => 'Actions',
        'new_add' => 'Add New',
        'close' => 'Close',
        'collection' => 'Collection',
        'filter' => 'Filter',
        'move' => 'Move',
    ],
    'inputs' => [
        'search' => 'Search...',
        'choose_one' => 'Choose one...',
    ],
    'modal_titles' => [
        'delete' => 'Delete',
    ],
    'modal_descriptions' => [
        'delete' => 'Are you sure you want to delete this record?',
    ],
];
