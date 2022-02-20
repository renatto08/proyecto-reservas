<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['shop_id','title','description','specification','price','price_sale','stock',
        'new','active','image','gallery','category_id'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'gallery' => 'array'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function reviews(){
        return random_int(1,20);
    }
    public function attributes(){
        return $this->hasMany(AttributeProduct::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class,'attribute_products');
    }

    public function sizes(){
        return $this->belongsToMany(Size::class,'attribute_products');
    }

    public function relateds($size=16){
        return Product::where('shop_id',$this->shop_id)->where('active',true)->where('id','<>',$this->id)
            ->where('category_id',$this->category_id)->orderBy('created_at','desc')->take($size)->get();
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "uploads/products";

        //$this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value)->encode('jpg', 90);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it from the root folder
            // that way, what gets saved in the database is the user-accesible URL
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }
    public function setGalleryAttribute($value)
    {
        $attribute_name = "gallery";
        $disk = "public";
        $destination_path = "uploads/products/gallery";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);

        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function getSlugAttribute(){
        return Str::slug($this->title);
    }

    public function getSerieAttribute(){
        $serie = $this->id;
        while (strlen($serie)<=5){
            $serie = "0".$serie;
        }
        return $serie;
    }

    public function getIsSaleAttribute(){
        return $this->price_sale>0;
    }

    public function getDescriptionShortAttribute(){
        return $this->description;
    }

}
