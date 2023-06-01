Vagrant.configure("2") do |config|
  config.vm.box = "generic/debian11"
  config.vm.hostname = "m07uf3"
  config.vm.provider "virtualbox" do |v|
    # v.gui = true
    v.name = "m07uf3"
    v.memory = 2048
    v.cpus = 2
    v.customize ['modifyvm', :id, '--clipboard', 'bidirectional']     
    config.vm.synced_folder "./codi", "/var/www/html" # S'ha de crear prèviament una carpeta de nom codi a la mateixa carpeta a on es troba Vagrantfile
    config.vm.synced_folder "./vagrant", "/home/vagrant/vagrant" # S'ha de crear prèviament una carpeta de nom vagrant a la mateixa carpeta a on es troba Vagrantfile
  end

  config.vm.network "public_network"
  
  config.vm.provision "shell", inline: <<-SHELL
    sudo apt-get update -y
    sudo apt-get install -y net-tools
    sudo apt-get install -y whois
	sudo apt-get -y install apt-transport-https ca-certificates curl gnupg2 software-properties-common
	curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -
	sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs) stable"
	sudo apt-get update -y
	sudo sudo apt-get -y install docker-ce docker-ce-cli containerd.io docker-compose
	sudo gpasswd -a vagrant docker
    sudo apt-get install -y apache2 apache2-doc
    sudo apt-get install -y libapache2-mod-php
    sudo apt-get install -y php7.4
    sudo apt-get install -y mariadb-server mariadb-client
    sudo apt-get install -y php7.4-mysql
    #
    # Noves línies afegides a Vagrantfile - 13/02/23
    # Afegint composer i paquets dels quals depén composer per ser intal·lat
    #
    sudo apt-get install -y php-bcmath php-json php-mbstring php-tokenizer php-xml php-zip
    sudo apt-get install -y composer
  SHELL

end
