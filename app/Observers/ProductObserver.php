<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
        $image =  $product->getOriginal('image');
        $disk = 'local';
        // if($image) if (strpos($image, 'http') === false) {
        //     if(\Storage::disk($disk)->exists("public/$image")){
        //         \Storage::disk($disk)->delete("public/$image");
        //     }
        // }
        // $pictures =  json_decode($product->getOriginal('pictures'),true)??[];
        // if($pictures) {
        //     $removePictures = array_diff($pictures,$product->pictures??[]);
        //     if($removePictures) foreach ($removePictures as $image) {
        //         # code...
        //         if (strpos($image, 'http') === false) {
        //             if(\Storage::disk($disk)->exists("public/$image")){
        //                 \Storage::disk($disk)->delete("public/$image");
        //             }
        //         }
        //     } 
        // }
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
        $disk = 'local';
        if($product->image) if (strpos($product->image, 'http') === false) {
            if(\Storage::disk($disk)->exists("public/$product->image")){
                \Storage::disk($disk)->delete("public/$product->image");
            }
        }
        if($product->pictures) foreach ($product->pictures as $image) {
            # code...
            if (strpos($image, 'http') === false) {
                if(\Storage::disk($disk)->exists("public/$image")){
                    \Storage::disk($disk)->delete("public/$image");
                }
            }
        } 

        $product->product_colors()->delete();
        $product->product_sizes()->delete();
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
