#!/usr/bin/env python

from charmhelpers.contrib.ansible import install_ansible_support
from charmhelpers.contrib.ansible import AnsibleHooks
import sys

hook_names = [
        'start',
        'stop',
        'config-changed',
        'upgrade-charm',
        'database-relation-changed',
        ]

hooks = AnsibleHooks(playbook_path='playbooks/site.yaml',
                     default_hooks=hook_names)


@hooks.hook('install', 'upgrade-charm')
def install():
    """Install ansible.

    The hook() helper decorating this install function ensures that after this
    function finishes, any tasks in the playbook tagged with install or
    upgrade-charm are executed.
    """
    install_ansible_support(from_ppa=True)


if __name__ == "__main__":
    hooks.execute(sys.argv)
