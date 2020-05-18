<?php

namespace App\Exports;

use App\product;
use Maatwebsite\Excel\Concerns\FromCollection;

class productsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return product::select('product_name', 'category_id', 'supplier_id', 'product_code', 'product_garage', 'product_route', 'product_image', 'buy_date', 'expire_date','buying_price','selling_price')->get( );
    }

    public function export()
    {
        return Excel::download(new productsExport, 'products.xlsx');
    }
}
