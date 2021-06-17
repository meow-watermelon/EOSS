<?php

// MetaData String:
// <filename>:<object_id>:<version>:<size>:<change_start_time_epoch>:<change_end_time_epoch>:<eof_state>

class MetaData {
    public $object_metadata;

    // initial metadata by using metadata array
    public function __construct($object_metadata_array) {
        $this->object_metadata = implode(':', $object_metadata_array);
    }

    // get object metadata
    public function get_metadata() {
        return $this->object_metadata;
    }

    // set object version field
    public function set_version($object_version) {
        $object_metadata_array = explode(':', $this->object_metadata);
        $object_metadata_array[2] = $object_version;
        $this->object_metadata = implode(':', $object_metadata_array);
    }

    // set write stop time field
    public function set_write_stop_time($write_stop_time) {
        $object_metadata_array = explode(':', $this->object_metadata);
        $object_metadata_array[5] = $write_stop_time;
        $this->object_metadata = implode(':', $object_metadata_array);
    }

    // set EOF flag field
    // EOF State Flags
    // 0: EOF CLOSED
    // 1: INITIAL METADATA UPDATE
    // 2: UPDATE-IN-PROGRESS (PUT)
    public function set_eof_flag($eof_flag) {
        $object_metadata_array = explode(':', $this->object_metadata);
        $object_metadata_array[6] = $eof_flag;
        $this->object_metadata = implode(':', $object_metadata_array);
    }
}

?>
