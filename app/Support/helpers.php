<?php

use Illuminate\Database\Eloquent\Model;

if (!function_exists('clean_masked_money')) {
    /**
     * Clean masked money.
     *
     * @param string $maskedMoney
     *
     * @return string
     */
    function clean_masked_money(string $maskedMoney): string
    {
        return preg_replace('/[.,]/', '', $maskedMoney);
    }
}

if (!function_exists('split_datatables_column_relation')) {
    function split_datatables_column_relation(string $columnWithRelation): array|string
    {
        $seperated = explode('.', $columnWithRelation);

        if (count($seperated) > 1) {
            $relation = array_shift($seperated);
            $remaining = implode('.', $seperated);

            $nested = split_datatables_column_relation($remaining);

            return [
                'relation' => $relation,
                'column' => $nested
            ];
        }

        return $columnWithRelation;
    }
}
if (!function_exists('get_datatables_column_relation')) {
    function get_datatables_column_relation(Model|string $builder, array|string $columns): string
    {
        if (is_array($columns)) {
            $relation = $columns['relation'];
            $column = $columns['column'];

            return get_datatables_column_relation($builder->$relation, $column);
        }

        return $builder->$columns;
    }
}

if (!function_exists('get_datatables_column_last_relation')) {
    function get_datatables_column_last_relation($columnData, $previousRelation = null): string
    {
        if (is_array($columnData) && isset($columnData['column'])) {
            return get_datatables_column_last_relation($columnData['column'], $columnData['relation']);
        }

        return $previousRelation;
    }
}

if (!function_exists('get_datatables_relational_column_name')) {
    function get_datatables_column_last_column(string $column): string
    {
        $columnData = split_datatables_column_relation($column);

        if (is_array($columnData)) {
            return get_datatables_column_last_relation($columnData);
        }

        return $column;
    }
}
