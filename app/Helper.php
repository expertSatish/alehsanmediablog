<?php

use App\Models\Category;

if (!function_exists('categoryNameById')) {
    function categoryNameById($id)
    {
      return Category::idByName($id);
    }
  }




