<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2fa7ba4a0380a0774831d02a4a1ca09c
{
    public static $classMap = array (
        'ApplicationHelper' => __DIR__ . '/../..' . '/src/cmp/applicationhelper.php',
        'Asd' => __DIR__ . '/../..' . '/src/cmp/comm/asd.php',
        'Command' => __DIR__ . '/../..' . '/src/cmp/comm/command.php',
        'CommandResolver' => __DIR__ . '/../..' . '/src/cmp/commandresolver.php',
        'Conf' => __DIR__ . '/../..' . '/src/cmp/conf.php',
        'Controller' => __DIR__ . '/../..' . '/src/controller.php',
        'DefaultCommand' => __DIR__ . '/../..' . '/src/cmp/comm/defaultcommand.php',
        'FormValidator' => __DIR__ . '/../..' . '/src/cmp/formvalidator.php',
        'HttpRequest' => __DIR__ . '/../..' . '/src/cmp/req/httprequest.php',
        'RegistrationCommand' => __DIR__ . '/../..' . '/src/cmp/comm/registrationcommand.php',
        'Registry' => __DIR__ . '/../..' . '/src/cmp/registry.php',
        'Request' => __DIR__ . '/../..' . '/src/cmp/req/request.php',
        'Routs' => __DIR__ . '/../..' . '/src/cmp/routs.php',
        'Student' => __DIR__ . '/../..' . '/src/cmp/student.php',
        'StudentMapper' => __DIR__ . '/../..' . '/src/cmp/studentmapper.php',
        'TableBuilder' => __DIR__ . '/../..' . '/src/cmp/tablebuilder.php',
        'ThankCommand' => __DIR__ . '/../..' . '/src/cmp/comm/thankcommand.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit2fa7ba4a0380a0774831d02a4a1ca09c::$classMap;

        }, null, ClassLoader::class);
    }
}
