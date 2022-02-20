<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shop extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'shops';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
     protected $fillable = ['name','code','address','logo','theme','active','email','phone','logo_shop',
         'footer','contact_description','contact_map','banner_top','banner_sidebar','banner_home',
         'facebook','twitter','instagram','youtube'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function categories(){
        return Category::where('shop_id',$this->id)->where('parent_id',null)->where('active',true)->get();
    }
    public function sliders(){
        return Slider::where('shop_id',$this->id)->where('active',true)->get();
    }

    public function categories_children($parent){
        return Category::where('shop_id',$this->id)->where('parent_id',$parent)->where('active',true)->get();
    }

    public function products($size=16){
        return Product::where('shop_id',$this->id)->where('active',true)->take($size)->orderBy('created_at','desc')->get();
    }

    public function products_offers($size=8){
        return Product::where('shop_id',$this->id)->where('active',true)->where('price_sale','>',0)->take($size)->orderBy('created_at','desc')->get();
    }

    public function colors(){
        return Color::where('shop_id',$this->id)->orderBy('name')->get();
    }
    public function sizes(){
        return Size::where('shop_id',$this->id)->orderBy('size')->get();
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

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
    public function setLogoAttribute($value)
    {
        $attribute_name = "logo";
        $disk = "public";
        $destination_path = "uploads/logo";
        // if the image was erased
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


    }

    public function setLogoShopAttribute($value)
    {
        $attribute_name = "logo_shop";
        $disk = "public";
        $destination_path = "uploads/logo";
        // if the image was erased
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


    }

    public function setBannerSidebarAttribute($value)
    {
        $attribute_name = "banner_sidebar";
        $disk = "public";
        $destination_path = "uploads/banners";
        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (starts_with($value, 'data:image'))
        {
            $image = \Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }

    }

    public function setBannerHomeAttribute($value)
    {
        $attribute_name = "banner_home";
        $disk = "public";
        $destination_path = "uploads/banners";
        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (starts_with($value, 'data:image'))
        {
            $image = \Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }

    }

    public function setBannerTopAttribute($value)
    {
        $attribute_name = "banner_top";
        $disk = "public";
        $destination_path = "uploads/banners";
        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (starts_with($value, 'data:image'))
        {
            $image = \Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }

    }
}
