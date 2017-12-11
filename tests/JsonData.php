<?php

namespace Vultr\Tests;

class JsonData
{
    private $response = [
        'snapshot/list' => '{
            "5359435d28b9a": {
                "SNAPSHOTID": "5359435d28b9a",
                "date_created": "2014-04-18 12:40:40",
                "description": "Test snapshot",
                "size": "42949672960",
                "status": "complete"
            },
            "5359435dc1df3": {
                "SNAPSHOTID": "5359435dc1df3",
                "date_created": "2014-04-22 16:11:46",
                "description": "",
                "size": "10000000",
                "status": "complete"
            }
        }',

        'snapshot/create' => '{
            "SNAPSHOTID": "544e52f31c706"
        }',

        'iso/list' => '{
            "24": {
                "ISOID": 24,
                "date_created": "2014-04-01 14:10:09",
                "filename": "CentOS-6.5-x86_64-minimal.iso",
                "size": 9342976,
                "md5sum": "ec0669895a250f803e1709d0402fc411"
            }
        }',

        'iso/create_from_url' => '{
            "ISOID": 24
        }',

        'plans/list' => '{
            "1": {
                "VPSPLANID": "1",
                "name": "Starter",
                "vcpu_count": "1",
                "ram": "512",
                "disk": "20",
                "bandwidth": "1",
                "price_per_month": "5.00",
                "windows": false,
                "plan_type": "SSD",
                "available_locations": [
                    1,
                    2,
                    3
                ]
            },
            "2": {
                "VPSPLANID": "2",
                "name": "Basic",
                "vcpu_count": "1",
                "ram": "1024",
                "disk": "30",
                "bandwidth": "2",
                "price_per_month": "8.00",
                "windows": false,
                "plan_type": "SATA",
                "available_locations": [],
                "deprecated": true
            }
        }',

        'plans/list_vc2' => '{
            "1": {
                "VPSPLANID": "1",
                "name": "Starter",
                "vcpu_count": "1",
                "ram": "512",
                "disk": "20",
                "bandwidth": "1",
                "price_per_month": "5.00",
                "plan_type": "SSD"
            }
        }',

        'plans/list_vdc2' => '{
            "115": {
                "VPSPLANID": "115",
                "name": "8192 MB RAM,110 GB SSD,10.00 TB BW",
                "vcpu_count": "2",
                "ram": "8192",
                "disk": "110",
                "bandwidth": "10.00",
                "price_per_month": "60.00",
                "plan_type": "DEDICATED"
            }
        }',

        'regions/list' => '{
            "1": {
                "DCID": "1",
                "name": "New Jersey",
                "country": "US",
                "continent": "North America",
                "state": "NJ",
                "ddos_protection": true
            },
            "2": {
                "DCID": "2",
                "name": "Chicago",
                "country": "US",
                "continent": "North America",
                "state": "IL",
                "ddos_protection": false
            }
        }',

        'regions/availability' => '[
            40,
            11,
            45,
            29,
            41,
            61
        ]',

        'startupscript/list' => '{
            "3": {
                "SCRIPTID": "3",
                "date_created": "2014-05-21 15:27:18",
                "date_modified": "2014-05-21 15:27:18",
                "name": "test ",
                "type": "boot",
                "script": "#!/bin/bash echo Hello World > /root/hello"
            },
            "5": {
                "SCRIPTID": "5",
                "date_created": "2014-08-22 15:27:18",
                "date_modified": "2014-09-22 15:27:18",
                "name": "test ",
                "type": "pxe",
                "script": "#!ipxe\necho Hello World\nshell"
            }
        }',

        'startupscript/create' => '{
            "SCRIPTID": 5
        }',

        'auth/info' => '{
            "acls": [
                "subscriptions",
                "billing",
                "support",
                "provisioning"
            ],
            "email": "example@vultr.com",
            "name": "Example Account"
        }',

        'dns/list' => '[
            {
                "domain": "example.com",
                "date_created": "2014-12-11 16:20:59"
            }
        ]',

        'dns/records' => '[
            {
                "type": "A",
                "name": "",
                "data": "127.0.0.1",
                "priority": 0,
                "RECORDID": 1265276
            },
            {
                "type": "CNAME",
                "name": "*",
                "data": "example.com",
                "priority": 0,
                "RECORDID": 1265277
            }
        ]',

        'dns/dnssec_info' => '[
            "example.com IN DNSKEY 257 3 13 kRrxANp7YTGqVbaWtMy8hhsK0jcG4ajjICZKMb4fKv79Vx/RSn76vNjzIT7/Uo0BXil01Fk8RRQc4nWZctGJBA==",
            "example.com IN DS 27933 13 1 2d9ac457e5c11a104e25d971d0a6254562bddde7",
            "example.com IN DS 27933 13 2 8858e7b0dfb881280ce2ca1e0eafcd93d5b53687c21da284d4f8799ba82208a9"
        ]',

        'dns/soa_info' => '{
            "nsprimary": "ns1.vultr.com",
            "email": "dnsadm@vultr.com"
        }',

        'sshkey/list' => '{
            "541b4960f23bd": {
                "SSHKEYID": "541b4960f23bd",
                "date_created": null,
                "name": "test",
                "ssh_key": "ssh-rsa AA... test@example.com"
            }
        }',

        'sshkey/create' => '{
            "SSHKEYID": "541b4960f23bd"
        }',

        'backup/list' => '{
            "543d34149403a": {
                "BACKUPID": "543d34149403a",
                "date_created": "2014-10-14 12:40:40",
                "description": "Automatic server backup",
                "size": "42949672960",
                "status": "complete"
            },
            "543d340f6dbce": {
                "BACKUPID": "543d340f6dbce",
                "date_created": "2014-10-13 16:11:46",
                "description": "",
                "size": "10000000",
                "status": "complete"
            }
        }',

        'user/list' => '[
            {
                "USERID": "564a1a7794d83",
                "name": "example user 1",
                "email": "example@vultr.com",
                "api_enabled": "yes",
                "acls": [
                    "manage_users",
                    "subscriptions",
                    "billing",
                    "provisioning"
                ]
            },
            {
                "USERID": "564a1a88947b4",
                "name": "example user 2",
                "email": "example@vultr.com",
                "api_enabled": "no",
                "acls": [
                    "support",
                    "dns"
                ]
            }
        ]',

        'user/create' => '{
            "USERID": "564a1a88947b4",
            "api_key": "AAAAAAAA"
        }',

        'server/list' => '{
            "576965": {
                "SUBID": "576965",
                "os": "CentOS 6 x64",
                "ram": "4096 MB",
                "disk": "Virtual 60 GB",
                "main_ip": "123.123.123.123",
                "vcpu_count": "2",
                "location": "New Jersey",
                "DCID": "1",
                "default_password": "nreqnusibni",
                "date_created": "2013-12-19 14:45:41",
                "pending_charges": "46.67",
                "status": "active",
                "cost_per_month": "10.05",
                "current_bandwidth_gb": 131.512,
                "allowed_bandwidth_gb": "1000",
                "netmask_v4": "255.255.255.248",
                "gateway_v4": "123.123.123.1",
                "power_status": "running",
                "server_state": "ok",
                "VPSPLANID": "28",
                "v6_network": "2001:DB8:1000::",
                "v6_main_ip": "2001:DB8:1000::100",
                "v6_network_size": "64",
                "v6_networks": [
                    {
                        "v6_network": "2001:DB8:1000::",
                        "v6_main_ip": "2001:DB8:1000::100",
                        "v6_network_size": "64"
                    }
                ],
                "label": "my new server",
                "internal_ip": "10.99.0.10",
                "kvm_url": "https://my.vultr.com/subs/novnc/api.php?data=eawxFVZw2mXnhGUV",
                "auto_backups": "yes",
                "tag": "mytag"
            }
        }',

        'server/bandwidth' => '{
            "incoming_bytes": [
                [
                    "2014-06-10",
                    "81072581"
                ],
                [
                    "2014-06-11",
                    "222387466"
                ],
                [
                    "2014-06-12",
                    "216885232"
                ],
                [
                    "2014-06-13",
                    "117262318"
                ]
            ],
            "outgoing_bytes": [
                [
                    "2014-06-10",
                    "4059610"
                ],
                [
                    "2014-06-11",
                    "13432380"
                ],
                [
                    "2014-06-12",
                    "2455005"
                ],
                [
                    "2014-06-13",
                    "1106963"
                ]
            ]
        }',

        'server/create' => '{
            "SUBID": "1312965"
        }',

        'server/list_ipv4' => '{
            "576965": [
                {
                    "ip": "123.123.123.123",
                    "netmask": "255.255.255.248",
                    "gateway": "123.123.123.1",
                    "type": "main_ip",
                    "reverse": "host1.example.com"
                },
                {
                    "ip": "123.123.123.124",
                    "netmask": "255.255.255.248",
                    "gateway": "123.123.123.1",
                    "type": "secondary_ip",
                    "reverse": "host2.example.com"
                },
                {
                    "ip": "10.99.0.10",
                    "netmask": "255.255.0.0",
                    "gateway": "",
                    "type": "private",
                    "reverse": ""
                }
            ]
        }',

        'server/list_ipv6' => '{
            "576965": [
                {
                    "ip": "2001:DB8:1000::100",
                    "network": "2001:DB8:1000::",
                    "network_size": "64",
                    "type": "main_ip"
                }
            ]
        }',

        'server/reverse_list_ipv6' => '{
            "576965": [
                {
                    "ip": "2001:DB8:1000::101",
                    "reverse": "host1.example.com"
                },
                {
                    "ip": "2001:DB8:1000::102",
                    "reverse": "host2.example.com"
                }
            ]
        }',

        'server/os_change_list' => '{
            "127": {
                "OSID": "127",
                "name": "CentOS 6 x64",
                "arch": "x64",
                "family": "centos",
                "windows": false,
                "surcharge": "0.00"
            },
            "148": {
                "OSID": "148",
                "name": "Ubuntu 12.04 i386",
                "arch": "i386",
                "family": "ubuntu",
                "windows": false,
                "surcharge": "0.00"
            }
        }',

        'server/upgrade_plan_list' => '[
            29,
            41,
            61
        ]',

        'server/neighbors' => '[
            23456
        ]',

        'server/get_user_data' => '{
            "userdata": "ZWNobyBIZWxsbyBXb3JsZA=="
        }',

        'server/app_change_list' => '{
            "1": {
                "APPID": "1",
                "name": "LEMP",
                "short_name": "lemp",
                "deploy_name": "LEMP on CentOS 6 x64",
                "surcharge": 0
            },
            "2": {
                "APPID": "2",
                "name": "WordPress",
                "short_name": "wordpress",
                "deploy_name": "WordPress on CentOS 6 x64",
                "surcharge": 0
            }
        }',

        'server/iso_status' => '{
            "state": "ready",
            "ISOID": "0"
        }',

        'server/backup_get_schedule' => '{
            "enabled": true,
            "cron_type": "weekly",
            "next_scheduled_time_utc": "2016-05-07 08:00:00",
            "hour": 8,
            "dow": 6,
            "dom": 0
        }',

        'reservedip/list' => '{
            "1313044": {
                "SUBID": 1313044,
                "DCID": 1,
                "ip_type": "v4",
                "subnet": "10.234.22.53",
                "subnet_size": 32,
                "label": "my first reserved ip",
                "attached_SUBID": 123456
            },
            "1313045": {
                "SUBID": 1313045,
                "DCID": 1,
                "ip_type": "v6",
                "subnet": "2001:db8:9999::",
                "subnet_size": 64,
                "label": "",
                "attached_SUBID": false
            }
        }',

        'reservedip/create' => '{
            "SUBID": 1312965
        }',

        'reservedip/convert' => '{
            "SUBID": 365352
        }',

        'app/list' => '{
            "1": {
                "APPID": "1",
                "name": "LEMP",
                "short_name": "lemp",
                "deploy_name": "LEMP on CentOS 6 x64",
                "surcharge": 0
            },
            "2": {
                "APPID": "2",
                "name": "WordPress",
                "short_name": "wordpress",
                "deploy_name": "WordPress on CentOS 6 x64",
                "surcharge": 0
            }
        }',

        'account/info' => '{
            "balance": "-5519.11",
            "pending_charges": "57.03",
            "last_payment_date": "2014-07-18 15:31:01",
            "last_payment_amount": "-1.00"
        }',

        'os/list' => '{
            "127": {
                "OSID": "127",
                "name": "CentOS 6 x64",
                "arch": "x64",
                "family": "centos",
                "windows": false
            },
            "148": {
                "OSID": "148",
                "name": "Ubuntu 12.04 i386",
                "arch": "i386",
                "family": "ubuntu",
                "windows": false
            }
        }',

        'block/list' => '[
            {
                "SUBID": 1313216,
                "date_created": "2016-03-29 10:10:04",
                "cost_per_month": 10,
                "status": "pending",
                "size_gb": 100,
                "DCID": 1,
                "attached_to_SUBID": null,
                "label": "files1"
            },
            {
                "SUBID": 1313217,
                "date_created": "2016-31-29 10:10:48",
                "cost_per_month": 5,
                "status": "active",
                "size_gb": 50,
                "DCID": 1,
                "attached_to_SUBID": 1313207,
                "label": "files2"
            }
        ]',

        'block/create' => '{
            "USERID": "564a1a88947b4",
            "api_key": "AAAAAAAA"
        }',

        'firewall/group_create' => '{
            "FIREWALLGROUPID": "1234abcd"
        }',

        'firewall/group_list' => '{
            "1234abcd": {
                "FIREWALLGROUPID": "1234abcd",
                "description": "my http firewall",
                "date_created": "2017-02-14 17:48:40",
                "date_modified": "2017-02-14 17:48:40",
                "instance_count": 2,
                "rule_count": 2,
                "max_rule_count": 50
            }
        }',

        'firewall/rule_create' => '{
            "rulenumber": 2
        }',

        'firewall/rule_list' => '{
            "1": {
                "rulenumber": 1,
                "action": "accept",
                "protocol": "icmp",
                "port": "",
                "subnet": "",
                "subnet_size": 0
            },
            "2": {
                "rulenumber": 2,
                "action": "accept",
                "protocol": "tcp",
                "port": "80",
                "subnet": "10.234.22.0",
                "subnet_size": 24
            }
        }',
    ];

    /**
     * Will mimic the behavior of get and post calls of the real Vultr API.
     *
     * @param string $url
     *
     * @return string
     */
    public function getResponse($url, array $args) {
        $response = '{}';

        // Handle server/list call with argument SUBID.
        switch ($url) {
            case 'server/list':
                if (isset($args['SUBID'])) {
                    $response = json_decode($this->response[$url], true);
                    $response = json_encode($response[$args['SUBID']]);
                }
                break;

            case 'plans/list':
                if (isset($args['type']) && $args['type'] != 'all') {
                    $response = json_decode($this->response[$url], true);
                    foreach ($response as $pos => $row) {
                        if (strtolower($row['plan_type']) != $args['type']) {
                            unset($response[$pos]);
                        }
                    }
                    $response = json_encode($response);
                }
                break;
        }

        if ($response === '{}' && isset($this->response[$url])) {
            $response = $this->response[$url];
        }

        return $response;
    }
}
