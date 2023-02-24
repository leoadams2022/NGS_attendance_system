<?php
class ImageUploader {
  private $upload_dir;
  public $root = 'http://localhost/MyProject/LoginAgain/';

  public function __construct($upload_dir) {
    $this->upload_dir = $upload_dir;
  }

  public function uploadImage($file,$name,$username) {
    // Check for errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
      // Handle the error
      throw new Exception('An error occurred while uploading the file.');
    }

    // Check if the file is an image
    $mime_type = mime_content_type($file['tmp_name']);
    if (strpos($mime_type, 'image/jpeg') !== 0) {
      // Handle the error
      throw new Exception('The uploaded file is not an image.');
    }

    // Generate a unique filename for the uploaded image
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $new_filename = $name . '_profile_image' . '.' . $extension;

    // Check if an image with the same name already exists
    if ($this->imageExists($new_filename)) {
        // Handle the error
        // throw new Exception('An image with the same name already exists.');
        $update_img = $this->updateImage($file, $new_filename,$username);
        return $update_img;
        // end();
    }

    // Move the uploaded file to its final destination with the new filename
    $target_file = $this->upload_dir . $new_filename;
    move_uploaded_file($file['tmp_name'], $target_file);

    // Return the URL of the uploaded image
    //echo ROOT . 'images/'. $user_name .'_profile_image.jpg'
    return $this->root . 'images/' . $new_filename;
  }






  public function updateImage($file, $filename,$username) {
    // Check for errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
      // Handle the error
      throw new Exception('An error occurred while uploading the file.');
    }

    // Check if the file is a JPEG image
    $mime_type = mime_content_type($file['tmp_name']);
    if ($mime_type !== 'image/jpeg') {
      // Handle the error
      throw new Exception('Only JPEG images are allowed.');
    }

    // Get the original file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // Generate a unique filename for the updated image
    $new_filename = $username . '_profile_image' . '.' . $extension;//uniqid() . '.' . $extension;

    // Delete the old file if it exists
    $old_file = $this->upload_dir . $filename;
    if (file_exists($old_file)) {
    unlink($old_file);
    }
    // Move the uploaded file to its final destination with the new filename
    $target_file = $this->upload_dir . $new_filename;
    move_uploaded_file($file['tmp_name'], $target_file);

   

    // Return the URL of the updated image
    return $this->root . 'images/' . $new_filename;
  }

  public function delete_img($img_name){
    if($this->imageExists($img_name)){
      $filepath = $this->upload_dir . $img_name;
      unlink($filepath);
      return 'img deleted';
    }
    return 'img dose not exsist';
  }

// returns true if the file exists, and false otherwise.
  public function imageExists($filename) {
    $filepath = $this->upload_dir . $filename;
    return file_exists($filepath);
  }
}
