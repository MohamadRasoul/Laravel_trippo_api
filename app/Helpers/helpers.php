<?php


if (!function_exists('pagination')) {

    function pagination($data)
    {
        if (request()->paginate) {
            $perPage = request()->perPage;
            $page    = request()->page;

            return $data->paginate($perPage, $columns = ['*'], 'page', $page);
        } else {
            return $data->get();
        }
    }
}


if (!function_exists('simplePagination')) {

    function simplePagination($data, $paginate, $perPage, $page)
    {
        if (request()->paginate) {
            $perPage = request()->perPage;
            $page    = request()->page;

            return $data->paginate($perPage, $columns = ['*'], 'page', $page);
        } else {
            return $data->get();
        }
    }
}
