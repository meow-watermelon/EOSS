<?php

class Version {
    // encode an object version string
    public function encode($object_name, $version_salt, $version_string) {
        $pre_version_string = implode(':', array($object_name, $version_salt, $version_string));
        $encode_version_string = base64_encode($pre_version_string);

        return $this->encode = $encode_version_string;
    }

    // decode an object version string into an array with object name, version salt and version string
    public function decode($encode_version_string) {
        $decode_version_string = base64_decode($encode_version_string);
        $version_bucket = explode(':', $decode_version_string);

        return $this->decode = $version_bucket;
    }
}

?>
