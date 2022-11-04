<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'slug', 'image', 'price', 'description', 'stock','category_id'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function getItems()
    {
        return $this->items;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getProductSlug()
    {
        return $this->attributes['slug'];
    }

    public function getProductDescription()
    {
        return $this->attributes['description'];
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }
    public function getProductName()
    {
        return $this->attributes['product_name'];
    }
    public function getPrice()
    {
        return $this->attributes['price'];
    }
    public function getStock()
    {
        return $this->attributes['stock'];
    }

    public function setStock($stock)
    {
        $this->attributes['stock'] = $stock;
    }
    public function getProductCategoryId()
    {
        return $this->attributes['category_id'];
    }

    public function setProductName($product_Name)
    {
        $this->attributes['product_name'] = $product_Name;
    }
    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }
    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice()*$productsInSession[$product->getId()]);
        }
        return $total;
    }


}
