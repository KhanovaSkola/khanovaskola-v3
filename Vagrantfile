# -*- mode: ruby -*-
# vi: set ft=ruby :

# Requirements:
#   vagrant plugin install vagrant-vbguest
#

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ks3.1"
  config.vm.box_url = "https://www.dropbox.com/s/cbqiijwo3ovapl7/khanovaskola-3.1.box"
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "private_network", ip: "192.168.56.101"
  config.vbguest.auto_update = true
  config.vbguest.no_remote = false
  config.vm.synced_folder ".", "/vagrant", type: "nfs"
  config.vm.synced_folder "~/.ssh", "/home/vagrant/shared-ssh", type: "nfs"
end
