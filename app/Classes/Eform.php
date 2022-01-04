<?php

namespace App\Classes;

use Faker\Provider\Image;

class Eform{
  public function uploadImage($image_object, $dir = 'public')
  {
    if (!empty($image_object)) {
      $photo = $image_object->store('public/images/'.$dir.'');
      $manager = new Image();
      $image_name = str_replace('public/images/'.$dir.'/', '', $photo);
      $image = $manager->make('storage/images/'.$dir.'/' . $image_name);
      $image->fit(300, 200);
      $image->save('storage/images/'.$dir.'/thumbnail_' . $image_name);
      return $image_name;
    }
  }
}