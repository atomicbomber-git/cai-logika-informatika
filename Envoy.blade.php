@servers(['web' => ['atomicbomber@209.97.164.201']])

@task('deploy', ['on' => 'web'])
    cd /var/www/cai-logika-informatika/
    git pull origin master
    composer install
    composer dump-autoload -o
@endtask
