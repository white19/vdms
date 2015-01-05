#include <iostream>
using namespace std;

int main(int argc, char* argv[]){

	cout<<"<domain type='kvm'>"<<endl;
	cout<<"<name>"<<argv[1]<<"</name>"<<endl;
	cout<<"<uuid>"<<argv[2]<<"</uuid>"<<endl;
	cout<<"<memory unit='KiB'>"<<argv[3]<<"</memory>"<<endl;
	cout<<"<currentMemory unit='KiB'>"<<argv[3]<<"</currentMemory>"<<endl;
	cout<<"<vcpu placement='static'>"<<argv[4]<<"</vcpu>"<<endl;
	cout<<"<os>\n"
		"<type arch='x86_64' machine='pc-0.15'>hvm</type>\n"
		"<boot dev='hd'/>\n"
		"</os>\n"
		"<features>\n"
		"<acpi/>\n"
		"<apic/>\n"
		"<pae/>\n"
		"</features>\n"
		"<clock offset='utc'/>\n"
		"<on_poweroff>destroy</on_poweroff>\n"
		"<on_reboot>restart</on_reboot>\n"
		"<on_crash>restart</on_crash>\n"
		"<devices>\n"
		"<emulator>/usr/bin/qemu-kvm</emulator>\n"
		"<disk type='file' device='disk'>\n"
		"<driver name='qemu' type='qcow2'/>"<<endl;
	cout<<"<source file='"<<argv[5]<<"'/>"<<endl;
	cout<<" <target dev='hda' bus='ide'/>\n"
		"<address type='drive' controller='0' bus='0' target='0' unit='0'/>\n"
		"</disk>\n"
		"<disk type='file' device='cdrom'>\n"
		"<driver name='qemu' type='raw'/>\n"<<endl;
	cout<<"<source file='"<<argv[6]<<"'/>"<<endl;
	cout<<"<target dev='hdb' bus='ide'/>\n"
		"<readonly/>\n"
		"<address type='drive' controller='0' bus='0' target='0' unit='1'/>\n"
		"</disk>\n"
		"<controller type='usb' index='0'>\n"
		"<address type='pci' domain='0x0000' bus='0x00' slot='0x01' function='0x2'/>\n"
		"</controller>\n"
		"<controller type='ide' index='0'>\n"
		"<address type='pci' domain='0x0000' bus='0x00' slot='0x01' function='0x1'/>\n"
		"</controller>\n"
		"<interface type='bridge'>"<<endl;
	cout<<"<mac address='"<<argv[7]<<"'/>\n"
		"<source bridge='vbr0'/>\n"
		"<virtualport type='openvswitch'>\n"
		"<parameters interfaceid='6ad8b64f-bd21-fe22-24e5-c4de2708e5bd'/>\n"
		"</virtualport>\n"
		"<address type='pci' domain='0x0000' bus='0x00' slot='0x03' function='0x0'/>\n"
		"</interface>\n"
		"<serial type='pty'>\n"
		"<target port='0'/>\n"
		"</serial>\n"
		"<console type='pty'>\n"
		"<target type='serial' port='0'/>\n"
		"</console>\n"
		"<input type='mouse' bus='ps2'/>\n"
		"<graphics type='vnc' port='"<<argv[8]<<"' autoport='no' listen='::' keymap='en-us'>\n"
		"<listen type='address' address='::'/>\n"
		"</graphics>\n"
		"<video>\n"
		"<model type='cirrus' vram='9216' heads='1'/>\n"
		"<address type='pci' domain='0x0000' bus='0x00' slot='0x02' function='0x0'/>\n"
		"</video>\n"
		"<memballoon model='virtio'>\n"
		"<address type='pci' domain='0x0000' bus='0x00' slot='0x04' function='0x0'/>\n"
		"</memballoon>\n"
		"</devices>\n"
		"</domain>"<<endl;


	return 0;
}

