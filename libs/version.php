<?php

class Version {
    public $object_version_string;
    public $object_version_bucket;

    // encode an object version string
    public function encode($object_name, $version_salt, $version_string) {
        if (is_null($version_string)) {
            $pre_version_string = $object_name;
        } else {
            $pre_version_string = implode(':', array($object_name, $version_salt, $version_string));
        }
        $encode_version_string = base64_encode($pre_version_string);
        $this->object_version_string = $encode_version_string;

        return $this->object_version_string;
    }

    // decode an object version string into an array with object name, version salt and version string
    public function decode($encode_version_string) {
        $decode_version_string = base64_decode($encode_version_string);
        $version_bucket = explode(':', $decode_version_string);
        $this->object_version_bucket = $version_bucket;

        return $this->object_version_bucket;
    }
}

?>
