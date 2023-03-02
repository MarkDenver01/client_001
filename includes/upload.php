<?php

class media_uploader {
  public $image_info;
  public $file_name;
  public $file_type;
  public $file_temp_path;

  // set destination for upload
  public $user_path = SITE_ROOT.DS.'..'.DS.'upload/users';
  public $error = array();

  // error types
  public $upload_errors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.'
  );

  // image extension type
  public $upload_extensions = array(
    'gif',
    'jpg',
    'jpeg',
    'png',
  );

  public function file_ext($temp_file_name) {
    $ext = strtolower(substr($temp_file_name, strrpos($temp_file_name, '.') + 1));
    if (in_array($ext, $this->upload_extensions)) {
      return true;
    }
  }

  public function upload($file) {
    if (!$file || empty($file) || !is_array($file)) {
      $this->errors[] = "No file was uploaded.";
      return false;
    } elseif ($file['error'] != 0) {
      $this->errors[] = $this->upload_errors[$file['error']];
      return false;
    } elseif (!$this->file_ext($file['name'])) {
      $this->errors[] = 'File not in a right format.';
      return false;
    } else {
      $this->image_info = getimagesize($file['tmp_name']);
      $this->file_name = basename($file['name']);
      $this->file_type = $this->image_info['mime'];
      $this->file_temp_path = $file['tmp_name'];
      return true;
    }
  }

  public function process($id) {
    if (!empty($this->errors)) {
      return false;
    } elseif (empty($this->file_name) || empty($this->file_temp_path)) {
      $this->errors[] = 'The file location was not available';
      return false;
    } elseif (!is_writeable($this->user_path)) {
      $this->errors[] = $this->user_path. "Must be writable.";
      return false;
    }elseif (!$id) {
      $this->errors[] = 'Missing user id';
      return false;
    } else {
      $ext = explode(".", $this->file_name);
      $new_name = randString(8).$id.'.'.end($ext);
      $this->file_Name = $new_name;
      if ($this->user_image_directory($id)) {
        if (move_uploaded_file($this->file_temp_path, $this->user_path.'/'.$this->file_name)) {
          if ($this->update_user_image($id)) {
            unset($this->file_temp_path);
            return true;
          }
        } else {
          $this->errors[] = 'The file upload failed possible due to incorrect permissions on the upload folder';
          return false;
        }
      }
    }
  }

  public function user_image_directory($id) {
    $image = find_by_id('user_account', $id);
    if ($image['image'] === 'no_image.jpg' || $image['image'] === '') {
      return true;
    } else {
      unlink($this->user_path.'/'.$image['image']);
      return true;
    }
  }

  private function update_user_image($id) {
    global $db;
    $sql = "UPDATE `user_account` SET";
    $sql .=" image='{$db->escape($this->file_name)}'";
    $sql .=" WHERE id ='{$db->escape($id)}'";
    return ($result && $db->affected_rows() === 1 ? true : false);
  }

  private function insert_user_image($id) {
    global $db;
    $sql = "INSERT INTO "
  }

}

?>
