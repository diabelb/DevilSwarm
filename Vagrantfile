$setup_docker = <<SCRIPT
curl -fsSL https://raw.githubusercontent.com/diabelb/DevilSwarm/master/install | bash
SCRIPT

Vagrant.configure(2) do |config|
  config.vm.define "swarmnode1" do |config|
    config.vm.box = "ubuntu/focal64"
    config.vm.hostname = "swarmnode1"
    config.vm.network "private_network", ip: "10.0.7.10"
    config.vm.provision "shell", inline: $setup_docker
  end

#   config.vm.define "swarmnode2" do |config|
#     config.vm.box = "ubuntu/focal64"
#     config.vm.hostname = "swarmnode2"
#     config.vm.network "private_network", ip: "10.0.7.11"
# #     config.vm.provision "shell", inline: $setup_docker
#   end
end
