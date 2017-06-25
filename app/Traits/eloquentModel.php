<?php
namespace App\Traits;

trait BrandsTrait {
    public function brandsAll() {
        // Get all the brands from the Brands Table.
        Brand::all();
    }
}