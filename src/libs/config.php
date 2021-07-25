<?php

class Config {
    public $config;

    // load the config file
    public function __construct($config_file) {
        $config = array();

        if (file_exists($config_file) && is_readable($config_file)) {
            $config = yaml_parse_file($config_file);
        }

        $this->config = $config;
    }

    // get whole config array
    public function get_config() {
        return $this->config;
    }

    // get ZooKeeper quorum
    public function get_zookeeper_quorum() {
        return $this->config['zk_quorum'];
    }

    // get ZooKeeper root path
    public function get_zookeeper_root() {
        return $this->config['zk_root'];
    }

    // get object store path
    public function get_object_store_path() {
        return $this->config['object_store_path'];
    }

    // get version salt
    public function get_version_salt() {
        return $this->config['version_salt'];
    }

    // get read buffer
    public function get_read_buffer() {
        return $this->config['read_buffer'];
    }

    // get write buffer
    public function get_write_buffer() {
        return $this->config['write_buffer'];
    }

    // get safe mode flag
    public function get_safe_mode_flag() {
        return $this->config['safe_mode'];
    }
}

?>
