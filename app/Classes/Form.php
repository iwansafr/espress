<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class Form
{
  public function label($name = 'title', $label = '', $attribute = array())
  {
    $label = empty($label) ? ucfirst($name) : ucfirst($label);
    $attribute_output = $this->array_to_attr($attribute);
    return view('form.label', ['label' => $label, 'name' => $name, 'attribute' => $attribute_output]);
  }

  public function input($name = 'title', $type = 'text', $label = '', $placeholder = '', $accept = '', $attribute = array())
  {
    $label = empty($label) ? ucfirst($name) : ucfirst($label);
    $placeholder = empty($placeholder) ? 'input ' . $label : $placeholder;
    $attribute_output = $this->array_to_attr($attribute);
    return view('form.input', ['name' => $name, 'type' => $type, 'label' => $label, 'placeholder' => $placeholder, 'accept' => $accept, 'attribute' => $attribute_output]);
  }
  public function select($name = 'title', $options = [], $label = '', $placeholder = '', $event = '', $attribute = array())
  {
    $label = empty($label) ? ucfirst($name) : ucfirst($label);
    $placeholder = empty($placeholder) ? 'Select ' . $label : $placeholder;
    $attribute_output = $this->array_to_attr($attribute);
    return view('form.select', ['name' => $name, 'options' => $options, 'label' => $label, 'placeholder' => $placeholder, 'event' => $event, 'attribute' => $attribute_output]);
  }
  public function textarea($name = 'title', $label = '', $placeholder = '', $attribute = array())
  {
    $label = empty($label) ? ucfirst($name) : ucfirst($label);
    $placeholder = empty($placeholder) ? 'Select ' . $label : $placeholder;
    $attribute_output = $this->array_to_attr($attribute);
    return view('form.textarea', ['name' => $name, 'label' => $label, 'placeholder' => $placeholder, 'attribute' => $attribute_output]);
  }
  public function checkbox($name = 'title',$label = '', $options = [], $placeholder = '', $attribute = array()){
    $label = empty($label) ? ucfirst($name) : ucfirst($label);
    $placeholder = empty($placeholder) ? 'Select ' . $label : $placeholder;
    $attribute_output = $this->array_to_attr($attribute);
    return view('form.checkbox', ['name' => $name, 'options' => $options, 'label' => $label, 'placeholder' => $placeholder, 'attribute' => $attribute_output]);
  }
  public function liveview($view, $param = array())
  {
    return view('form.liveview', ['view' => $view, $param]);
  }
  public function array_to_attr($attribute = array())
  {
    $attribute_output = '';
    if (!empty($attribute)) {
      if (is_array($attribute)) {
        $tmp_output = [];
        foreach ($attribute as $key => $value) {
          $tmp_output[] = $key . '=' . $value;
        }
        $attribute_output = implode(' ', $tmp_output);
      } else {
        $attribute_output = $attribute;
      }
    } else {
      $attribute_output = '';
    }
    return $attribute_output;
  }
  public function uploadImage($image_object, $dir = 'public', $old_image = '')
  {
    if (!empty($image_object)) {
      $photo = $image_object->store('public/images/'.$dir.'');
      $manager = new ImageManager();
      $image_name = str_replace('public/images/'.$dir.'/', '', $photo);
      $image = $manager->make('storage/images/'.$dir.'/' . $image_name);
      $image->fit(300, 200);
      $image->save('storage/images/'.$dir.'/thumbnail_' . $image_name);
      if(!empty($old_image)){
        Storage::delete(['public/images/'.$dir.'/' . $old_image, 'public/images/'.$dir.'/thumbnail_' . $old_image]);
      }
      return $image_name;
    }
  }
}
