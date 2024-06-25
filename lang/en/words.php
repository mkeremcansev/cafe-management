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
        'logout' => 'Logout',
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
        ],
        'error' => [
            'validations' => [
                'general_error' => 'An error occurred while validating the form.',
                'high_amount' => 'The amount you entered is higher than the total price.',
                'product_quantity_greater_than_cart' => 'The quantity you entered is greater than the cart quantity.',
            ],
            'general_error' => 'An error occurred.',
        ],
    ],
    'content' => [
        'category_details' => 'Category Details',
        'product_details' => 'Product Details',
        'table_details' => 'Table Details',
        'manual_collection' => 'Manuel Collection',
        'product_collection' => 'Product Collection',
        'analysis' => [
            'open_tables_amount' => 'Open Tables Amount',
            'total_sales_amount' => 'Total Sales Amount',
            'last_month_sales_amount' => 'Last Month Sales Amount',
            'last_day_sales_amount' => 'Last Day Sales Amount',
        ]
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
