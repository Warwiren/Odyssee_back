<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:Warwiren/Odyssee_back.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('vm')
    ->set('hostname', '192.168.91.128')
    ->set('remote_user', 'warwi')
    ->set('deploy_path', '/var/www/Odyssee_deployer');

// Hooks

after('deploy:failed', 'deploy:unlock');
