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
        ],
    ],
    'content' => [
        'category_details' => 'Category Details',
        'product_details' => 'Product Details',
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
    ],
    'inputs' => [
        'search' => 'Search...',
    ],
    'modal_titles' => [
        'delete' => 'Delete',
    ],
    'modal_descriptions' => [
        'delete' => 'Are you sure you want to delete this record?',
    ],
];
