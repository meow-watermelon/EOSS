The following installation steps are verified based on the following components version:

>PHP: 7.4.16
>PHP Pear: 1.10.12
>ZooKeeper Client: 3.4.14
>PHP ZooKeeper: Master Branch
>OS: Fedora 33

Installation Steps
---------------------

1. Download the ZooKeeper 3.4.14 from https://archive.apache.org/dist/zookeeper/zookeeper-3.4.14/zookeeper-3.4.14.tar.gz and unpack the tarball.

2. Copy `/path/to/zookeeper-3.4.14/zookeeper-client/zookeeper-client-c/generated/zookeeper.jute.h` to `/path/to/zookeeper-3.4.14/zookeeper-client/zookeeper-client-c/include` directory.

3. Start to run the `configure` script. The default defined lib path is `/usr/local/lib`.

4. Edit **CFLAGS** option in the Makefile as following:

`CFLAGS = -g -O2 -D_GNU_SOURCE -Wno-error=format-overflow -Wno-error=stringop-truncation`

5. Run `make && make install` to install the ZooKeeper libs.

6. Edit `/etc/ld.so.conf` to add the lib path if not existed then run ldconfig to cache the shared libs.

7. Checkout the PHP ZooKeeper from GitHub https://github.com/php-zookeeper/php-zookeeper.git.

8. Go to the php-zookeeper directory and run the following command:

`$ ./configure --with-php-config=/usr/bin/php-config --with-libzookeeper-dir=/path/to/zookeeper-3.4.14/zookeeper-client/zookeeper-client-c`

then run `make` to build the PHP ZooKeeper module.

9. Once the module is created it's located at `/path/to/php-zookeeper/modules/zookeeper.so`. Copy this module to `/usr/lib64/php/modules` then edit `/etc/php.ini` to add following lines:

>; zookeeper
>extension=zookeeper.so

10. Run the following command to verify the module is installed:

`$ php -m | grep zookeeper`
