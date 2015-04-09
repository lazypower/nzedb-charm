![NZEDB](http://nzedb.com/img/logo.png)

nZEDb is a fork of the open source usenet indexer newznab plus: [github.com/anth0/nnplus](http://github.com/anth0/nnplus).

nZEDb automatically scans usenet, similar to the way google search bots scan the internet. It does this by collecting usenet headers and temporarily storing them in an SQL database. It provides a web-based front-end providing search, browse and programmable (API) functionality.

This Juju charm configures the predependencies, and offers orechestration by
relating to the MySQL charm (forked from the official charm store, located
[here](https://github.com/chuckbutler/mysql-charm)) to separate concerns.

The Deployment topology when you are done should resemble the following:

```
  mysql:
    charm: trusty/mysql
    exposed: false
    relations:
      cluster:
      - mysql
      db:
      - nzedb
    units:
      mysql/0:
        agent-state: started
        machine: "2"
        public-address: xxx.xxx.xxx.xxx
  nzedb:
    charm: trusty/nzedb
    exposed: true
    relations:
      database:
      - mysql
    units:
      nzedb/0:
        agent-state: started
        machine: "1"
        open-ports:
        - 80/tcp
        public-address: xxx.xxx.xxx.xxx
```

## To Get Started

Follow the [Juju Vagrant getting started guide](https://jujucharms.com/docs/stable/config-vagrant)


    vagrant up

Once inside the vagrant container, install `juju-deployer`

    sudo apt-get install juju-deployer
    juju-deployer -c https://gist.githubusercontent.com/chuckbutler/aef4ddb42df48ac925ce/raw/700649a0cc55b97220d75623ac6589a8b5b4b776/nzedb-base.yaml


This will fetch the charm code from Github, Deploy the services to local LXC
containers, and configure nZEDb + MySQL according to the [Ubuntu Guide](https://github.com/nZEDb/nZEDb_Misc/blob/master/Guides/Installation/Ubuntu/Guide.md)

From here, visit the IP address of the nZEDb service:

    http://ip-of-service/install

Autopilot through the configuration, and you should be up and running with a
vanilla nZEDb installation. (you will need your own newsgroup server
credentials...)

    juju set nzedb nntp_hostname=news.astraweb.com
    juju set nzedb nntp_port=443
    juju set nzedb nntp_user=indexer9000
    juju set nzedb nntp_password=jujumadethiseasy

This bundle leaves you off on step 13 of the HOWTO. Planned feature to include
auto-starting the TMUX indexer via juju actions. The nZEDb charm also ships
with manual indexing options via actions:

    juju action do nzedb/0 updatebin
    juju action do nzedb/0 updaterelease

This will kick off the manual process of updating the bins and releaes once they
have been configured in the administrative panel of the nZEDb site. These actions
can be run anytime. **Do not run these if you are running the tmux scripts**

