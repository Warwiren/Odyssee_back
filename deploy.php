<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:Warwiren/Odyssee_back.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('192.168.91.128')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/var/www/Odyssee_back');

// Hooks

after('deploy:failed', 'deploy:unlock');
