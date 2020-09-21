<?php

use Illuminate\Support\Facades\Auth;
// change int db user role to string

function user_role_changer($role)
{
    switch ($role)
    {
        case 1:
            return 'Administrator';
            break;
        case 2:
            return 'Księgowy';
            break;
        case 3:
            return 'Pracownik biurowy';
            break;
        case 4:
            return 'Technik';
            break;
        default:
            break;
    }
}

// change int db user workplace to string

function user_workplace_changer($workplace)
{
    switch ($workplace)
    {
        case 1:
            return 'Przemyśl';
            break;
        case 2:
            return 'Jarosław';
            break;
        default:
            break;
    }
}


// change int warehouse to name place

function warehouse_changer($warehouse)
{
    switch ($warehouse)
    {
        case 1:
            return 'Przemyśl';
            break;
        case 2:
            return 'Jarosław';
            break;
        default:
            break;
    }
}

function str_limiter($string, $limit)
{
    if (strlen($string) > $limit)
    {
        $string = substr($string, 0, $limit) . '...';
    }
    return $string;
}


// validate role

function is_admin()
{
    if (Auth::user()->role == 1) {
        return true;
    }
    return false;
}

function is_accountant()
{
    if (Auth::user()->role == 2) {
        return true;
    }
    return false;
}

function is_worker()
{
    if (Auth::user()->role == 3) {
        return true;
    }
    return false;
}

function is_technician()
{
    if (Auth::user()->role == 4) {
        return true;
    }
    return false;
}
